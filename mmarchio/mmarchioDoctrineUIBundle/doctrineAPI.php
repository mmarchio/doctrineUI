<?php
/**
 * Created by IntelliJ IDEA.
 * User: matt
 * Date: 9/26/18
 * Time: 4:25 PM
 */

namespace mmarchio\mmarchioDoctrineUIBundle;


use Symfony\Component\HttpFoundation\Request;
use mmarchio\mmarchioDoctrineUIBundle\Entity\ArrayType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\BigIntType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\BinaryType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\BlobType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\BooleanType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\DateTimeType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\DateTimeTZType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\DateType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\DecimalType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\FloatType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\GuidType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\IntegerType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\JsonArrayType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\SimpleArrayType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\SmallIntType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\TextType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\TimeType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\ObjectType;
use mmarchio\mmarchioDoctrineUIBundle\Entity\StringType;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Cache\Simple\FilesystemCache;

class doctrineAPI
{
    public function generateEntityCommand(object $e)
    {
        $string = "php ../bin/console generate:doctrine:entity --no-interaction ";
        $string .= "--entity=" .$e->entityName. " ";
        $string .= "--format=" .$e->format. " ";
        $string .= '--fields="';
        $c = count($e->fields);
        $fields = "";
        for ($i=0; $i<$c; $i++) {
            $fields .= $e->fields[$i]->getName().":".$e->fields[$i]->getType();
            $temp = "(";
            if (method_exists($e->fields[$i], "getLength")) {
                $temp .= " length=".$e->fields[$i]->getLength();
            }
            if (method_exists($e->fields[$i], "getNullable")) {
                $temp .= " nullable=". $this->boolToLiteral($e->fields[$i]->getNullable());
            }
            if (method_exists($e->fields[$i], "getUnique")) {
                $temp .= " unique=" . $this->boolToLiteral($e->fields[$i]->getUnique());
            }
            if (method_exists($e->fields[$i], "getPrecision")) {
                $temp .= " precision=" .$e->fields[$i]->getPrecision();
            }
            if (method_exists($e->fields[$i], "getScale")) {
                $temp .= " scale=" .$e->fields[$i]->getScale();
            }
            $temp .= ") ";
            if ($temp !== "()") {
                $fields .= str_replace("( ", "(", $temp);
            }
        }
        $string .= rtrim($fields).'"';
        return $string;
    }

    public function generateSchemaUpdateCommand()
    {
        return "php ../bin/console doctrine:schema:update --force";
    }

    public function boolToLiteral($value)
    {
        $r = "false";
        if ($value === true) {
            $r = "true";
        }
        return $r;
    }

    public function isDev(Request $request)
    {
        if (strpos($request->getRequestUri(), "/app_dev.php") !== false) {
            return true;
        }
        return false;
    }

    public function getTypeFactory($field)
    {
        switch ($field->type) {
            case "array":
                return new ArrayType($field);
                break;
            case "bigint":
                return new BigIntType($field);
                break;
            case "binary":
                return new BinaryType($field);
                break;
            case "blob":
                return new BlobType($field);
                break;
            case "boolean":
                return new BooleanType($field);
                break;
            case "datetime":
                return new DateTimeType($field);
                break;
            case "datetimetz":
                return new DateTimeTZType($field);
                break;
            case "date":
                return new DateType($field);
                break;
            case "decimal":
                return new DecimalType($field);
                break;
            case "float":
                return new FloatType($field);
                break;
            case "guid":
                return new GuidType($field);
                break;
            case "integer":
                return new IntegerType($field);
                break;
            case "json_array":
                return new JsonArrayType($field);
                break;
            case "object":
                return new ObjectType($field);
                break;
            case "simple_array":
                return new SimpleArrayType($field);
                break;
            case "smallint":
                return new SmallIntType($field);
                break;
            case "string":
                return new StringType($field);
                break;
            case "text":
                return new TextType($field);
                break;
            case "time":
                return new TimeType($field);
                break;
            default:
                return null;
                break;
        }
    }

    public function run(string $command)
    {
        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }

    public function createTable(Request $request, $bundle)
    {
        $data = new \stdClass();
        $cache = new FilesystemCache();
        $data->url = $request->getSchemeAndHttpHost();
        if (!empty($request->getContent())) {
            $payload = new \stdClass();
            $payload->tableName = $request->get("table_name");
            $payload->entityName = $bundle.":".$request->get("table_name");
            $payload->format = $request->get("table_format");
            $payload->fields = [];
            $i = 0;
            while (!empty($request->get("field_type_".$i))) {
                $temp = new \stdClass();
                $temp->name = $request->get("field_title_".$i);
                $temp->type = $request->get("field_type_".$i);
                $temp->nullable = $request->get("field_nullable_".$i);
                $temp->unique = $request->get("field_unique_".$i);
                $temp->precision = $request->get("field_precision_".$i) ?? null;
                $temp->scale = $request->get("field_scale_".$i) ?? null;
                $temp->length = $request->get("field_length_".$i) ?? null;
                $payload->fields[] = $temp;
                $i++;
            }
            $entity = $this->createEntity($cache, $payload);
            $process = $this->run($this->generateEntityCommand($entity));
            $process = $this->run($this->generateSchemaUpdateCommand());
            $data->msg = $payload->tableName. " successfully created";
        }
        return $data;
    }

    public function createTableApi($payload, $bundle) {
        $data = new \stdClass();
        $cache = new FilesystemCache();
        $payload->entityName = $bundle.":".$payload->entityName;
        $entity = $this->createEntity($cache, $payload);
        dump($entity);
        $process = $this->run($this->generateEntityCommand($entity));
        $process = $this->run($this->generateSchemaUpdateCommand());
        $data->msg = $payload->tableName. " successfully created";

        return json_encode($data);
    }

    protected function createEntity(FilesystemCache $cache, object $payload)
    {
        $e = null;
        dump($payload);
        if ($this->validatePayload($payload) === true) {
            if (!empty($payload->id) && $cache->has($payload->id)) {
                $e = json_decode($cache->get($payload->id));
            } else {
                $e = new \stdClass();
                $e->entityName = $payload->entityName;
//                $e->id = $this->genUuid();
                $e->tableName = $payload->tableName;
                $e->format = $payload->format ?? "annotation";
                $e->fields = [];
            }
            $c = count($payload->fields);
            for ($i = 0; $i < $c; $i++) {
                $e->fields[] = $this->getTypeFactory($payload->fields[$i]);
            }
        }
        return $e;
    }

    protected function validatePayload(object $p)
    {
        if (empty($p->entityName)) {
            return false;
        }
//        if (empty($p->tableName)) {
//            return false;
//        }
        if (empty($p->format)) {
            return false;
        }
        if (empty($p->fields)) {
            return false;
        }
        foreach ($p->fields as $field) {
            if (empty($field->name)) {
                return false;
            }
            if (empty($field->type) || !is_string($field->type)) {
                return false;
            }
//            if (empty($field->nullable)) {
//                return false;
//            }
//            if (empty($field->unique)) {
//                return false;
//            }
        }
        return true;
    }

    protected function genUuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
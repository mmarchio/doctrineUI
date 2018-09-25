<?php

namespace DoctrineUIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * fields
 *
 * @ORM\Table(name="fields")
 * @ORM\Entity(repositoryClass="DoctrineUIBundle\Repository\fieldsRepository")
 */
class fields
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var array
     *
     * @ORM\Column(name="array_type", type="array")
     */
    private $arrayType;

    /**
     * @var array
     *
     * @ORM\Column(name="simple_array_type", type="simple_array")
     */
    private $simpleArrayType;

    /**
     * @var array
     *
     * @ORM\Column(name="json_array_type", type="json_array")
     */
    private $jsonArrayType;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="object_type", type="object")
     */
    private $objectType;

    /**
     * @var bool
     *
     * @ORM\Column(name="boolean_type", type="boolean")
     */
    private $booleanType;

    /**
     * @var int
     *
     * @ORM\Column(name="integer_type", type="integer")
     */
    private $integerType;

    /**
     * @var int
     *
     * @ORM\Column(name="smallint_type", type="smallint")
     */
    private $smallintType;

    /**
     * @var int
     *
     * @ORM\Column(name="bigint_type", type="bigint")
     */
    private $bigintType;

    /**
     * @var string
     *
     * @ORM\Column(name="string_type", type="string", length=255)
     */
    private $stringType;

    /**
     * @var string
     *
     * @ORM\Column(name="text_type", type="text")
     */
    private $textType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime_type", type="datetime")
     */
    private $datetimeType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetimez_type", type="datetimetz")
     */
    private $datetimezType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_type", type="date")
     */
    private $dateType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_type", type="time")
     */
    private $timeType;

    /**
     * @var string
     *
     * @ORM\Column(name="decimal_type", type="decimal", precision=10, scale=0)
     */
    private $decimalType;

    /**
     * @var float
     *
     * @ORM\Column(name="float_type", type="float")
     */
    private $floatType;

    /**
     * @var binary
     *
     * @ORM\Column(name="binary_type", type="binary")
     */
    private $binaryType;

    /**
     * @var string
     *
     * @ORM\Column(name="blob_type", type="blob")
     */
    private $blobType;

    /**
     * @var guid
     *
     * @ORM\Column(name="guid_type", type="guid")
     */
    private $guidType;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set arrayType
     *
     * @param array $arrayType
     *
     * @return fields
     */
    public function setArrayType($arrayType)
    {
        $this->arrayType = $arrayType;

        return $this;
    }

    /**
     * Get arrayType
     *
     * @return array
     */
    public function getArrayType()
    {
        return $this->arrayType;
    }

    /**
     * Set simpleArrayType
     *
     * @param array $simpleArrayType
     *
     * @return fields
     */
    public function setSimpleArrayType($simpleArrayType)
    {
        $this->simpleArrayType = $simpleArrayType;

        return $this;
    }

    /**
     * Get simpleArrayType
     *
     * @return array
     */
    public function getSimpleArrayType()
    {
        return $this->simpleArrayType;
    }

    /**
     * Set jsonArrayType
     *
     * @param array $jsonArrayType
     *
     * @return fields
     */
    public function setJsonArrayType($jsonArrayType)
    {
        $this->jsonArrayType = $jsonArrayType;

        return $this;
    }

    /**
     * Get jsonArrayType
     *
     * @return array
     */
    public function getJsonArrayType()
    {
        return $this->jsonArrayType;
    }

    /**
     * Set objectType
     *
     * @param \stdClass $objectType
     *
     * @return fields
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * Get objectType
     *
     * @return \stdClass
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * Set booleanType
     *
     * @param boolean $booleanType
     *
     * @return fields
     */
    public function setBooleanType($booleanType)
    {
        $this->booleanType = $booleanType;

        return $this;
    }

    /**
     * Get booleanType
     *
     * @return bool
     */
    public function getBooleanType()
    {
        return $this->booleanType;
    }

    /**
     * Set integerType
     *
     * @param integer $integerType
     *
     * @return fields
     */
    public function setIntegerType($integerType)
    {
        $this->integerType = $integerType;

        return $this;
    }

    /**
     * Get integerType
     *
     * @return int
     */
    public function getIntegerType()
    {
        return $this->integerType;
    }

    /**
     * Set smallintType
     *
     * @param integer $smallintType
     *
     * @return fields
     */
    public function setSmallintType($smallintType)
    {
        $this->smallintType = $smallintType;

        return $this;
    }

    /**
     * Get smallintType
     *
     * @return int
     */
    public function getSmallintType()
    {
        return $this->smallintType;
    }

    /**
     * Set bigintType
     *
     * @param integer $bigintType
     *
     * @return fields
     */
    public function setBigintType($bigintType)
    {
        $this->bigintType = $bigintType;

        return $this;
    }

    /**
     * Get bigintType
     *
     * @return int
     */
    public function getBigintType()
    {
        return $this->bigintType;
    }

    /**
     * Set stringType
     *
     * @param string $stringType
     *
     * @return fields
     */
    public function setStringType($stringType)
    {
        $this->stringType = $stringType;

        return $this;
    }

    /**
     * Get stringType
     *
     * @return string
     */
    public function getStringType()
    {
        return $this->stringType;
    }

    /**
     * Set textType
     *
     * @param string $textType
     *
     * @return fields
     */
    public function setTextType($textType)
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * Get textType
     *
     * @return string
     */
    public function getTextType()
    {
        return $this->textType;
    }

    /**
     * Set datetimeType
     *
     * @param \DateTime $datetimeType
     *
     * @return fields
     */
    public function setDatetimeType($datetimeType)
    {
        $this->datetimeType = $datetimeType;

        return $this;
    }

    /**
     * Get datetimeType
     *
     * @return \DateTime
     */
    public function getDatetimeType()
    {
        return $this->datetimeType;
    }

    /**
     * Set datetimezType
     *
     * @param \DateTime $datetimezType
     *
     * @return fields
     */
    public function setDatetimezType($datetimezType)
    {
        $this->datetimezType = $datetimezType;

        return $this;
    }

    /**
     * Get datetimezType
     *
     * @return \DateTime
     */
    public function getDatetimezType()
    {
        return $this->datetimezType;
    }

    /**
     * Set dateType
     *
     * @param \DateTime $dateType
     *
     * @return fields
     */
    public function setDateType($dateType)
    {
        $this->dateType = $dateType;

        return $this;
    }

    /**
     * Get dateType
     *
     * @return \DateTime
     */
    public function getDateType()
    {
        return $this->dateType;
    }

    /**
     * Set timeType
     *
     * @param \DateTime $timeType
     *
     * @return fields
     */
    public function setTimeType($timeType)
    {
        $this->timeType = $timeType;

        return $this;
    }

    /**
     * Get timeType
     *
     * @return \DateTime
     */
    public function getTimeType()
    {
        return $this->timeType;
    }

    /**
     * Set decimalType
     *
     * @param string $decimalType
     *
     * @return fields
     */
    public function setDecimalType($decimalType)
    {
        $this->decimalType = $decimalType;

        return $this;
    }

    /**
     * Get decimalType
     *
     * @return string
     */
    public function getDecimalType()
    {
        return $this->decimalType;
    }

    /**
     * Set floatType
     *
     * @param float $floatType
     *
     * @return fields
     */
    public function setFloatType($floatType)
    {
        $this->floatType = $floatType;

        return $this;
    }

    /**
     * Get floatType
     *
     * @return float
     */
    public function getFloatType()
    {
        return $this->floatType;
    }

    /**
     * Set binaryType
     *
     * @param binary $binaryType
     *
     * @return fields
     */
    public function setBinaryType($binaryType)
    {
        $this->binaryType = $binaryType;

        return $this;
    }

    /**
     * Get binaryType
     *
     * @return binary
     */
    public function getBinaryType()
    {
        return $this->binaryType;
    }

    /**
     * Set blobType
     *
     * @param string $blobType
     *
     * @return fields
     */
    public function setBlobType($blobType)
    {
        $this->blobType = $blobType;

        return $this;
    }

    /**
     * Get blobType
     *
     * @return string
     */
    public function getBlobType()
    {
        return $this->blobType;
    }

    /**
     * Set guidType
     *
     * @param guid $guidType
     *
     * @return fields
     */
    public function setGuidType($guidType)
    {
        $this->guidType = $guidType;

        return $this;
    }

    /**
     * Get guidType
     *
     * @return guid
     */
    public function getGuidType()
    {
        return $this->guidType;
    }
}


Doctrine UI

Provides a simplistic UI and API to generate doctrine entities and tables.

****Installation****
1. add the following line to app/AppKernel.php.
```$xslt
new mmarchio\mmarchioDoctrineUIBundle\mmarchioDoctrineUIBundle(),

```

2. add the following to app/config/routing.yml.
```$xslt
app:
    resource: '@mmarchioDoctrineUIBundle/Controller/'
    type: annotation

    resource: '@mmarchioDoctrineUIBundle/Resources/'
    type: annotation

```

3. add the following to app/config/config.yml.
```aidl
twig:
    paths:
          "%kernel.project_dir%/src/mmarchio/mmarchioDoctrineUIBundle/Resources/views": doctrineUI

```

4. add the following to composer.json.
```aidl
        "psr-4": {
            "mmarchio\\mmarchioDoctrineUIBundle\\": "src/mmarchio/mmarchioDoctrineUIBundle"
        }    

```
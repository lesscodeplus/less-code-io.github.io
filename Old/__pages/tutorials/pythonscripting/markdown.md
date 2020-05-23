## Scripting with Python
<br/>

In situations when you need to use coding to handle special scenarios, you can use the Python scripting atom.

To create a Python scripting atom instance, you can use the following command.

```bash
generate view:script:default
```

The command will ask you the following information;


```bash
Instance name (pythonScript) :
Route (/pythonscript) :
Method (GET) :
File name (script.py) :
Are all the inputs correct (yes) ?
```

The command will generate the following yaml code.

```yaml
events:
    http:
        pythonScript:
            route: /pythonscript
            method: GET 
            urn: python-script
            config:
                script: "script.py"
```

The command will also generate a new file based on the inputs called 'script.py'. To assign response to the endpoint you can assign any value to the Output variable.


```python
Output = "Works"
```

To test the endpoint you can use the following command;

```bash
curl -X GET http://localhost:5000/pythonscript
```

Which will return the following output;

```json
{
    "success": true,
    "response": "Works",
    "error": null,
    "message": null
}
```
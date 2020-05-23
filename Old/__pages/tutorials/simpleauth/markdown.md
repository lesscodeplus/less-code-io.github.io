## Securing your APIs
<br/>

To secure your APIs less-code has a group of atoms known as simple-auth. Simple Auth works with data manager to save users in the database, and to authenticate. Simple Auth also ships with a API firewall that will prevent unauthorized access to the api. When the user is authenticated a JWT token is returned that can be used to authorize the APIs.

This tutorial also uses the command <code>lesscode generate</code> to add various parts to the blueprint.

In addition this tutorial can be continued from the previous tutorial.

<br/>
#### Create a login endpoint
<br/>

To create an endpoint that will allow uses to authenticate with your API you can run the following command;

```bash
$ lesscode generate view:auth:login
```

The command will generate the following code in your blueprint.
The code also includes Data Manager schemas that will enable Simple Auth to store users in the database.

```yaml
events:
    http:
        simpleAuthLogin:
            route: /auth/login
            method: POST
            urn: simple-auth-login

schemas:
    auth:
        users:
            id:
                type: int
                autoIncrement: true
                primaryKey: true
            
            userName:
                type: string
                maxLength: 20
                isNull: false
            
            firstName:
                type: string
                maxLength: 20
                isNull: false
            
            lastName:
                type: string
                maxLength: 50
                isNull: false
            
            password:
                type: string
                maxLength: 50
                isNull: false
				
```

</br>
#### Create an endpoint to register a user
</br>

Similarly to generate an endpoint to register users, you can use the following command;


```bash
$ lesscode generate view:auth:register
```

Which will generate the following code in your blueprint.

```yaml
events:
    http:
        simpleAuthRegisterUser:
            route: /auth/register
            method: POST
            urn: simple-auth-register
```

</br>
#### Adding an authorizer to restrict unauthorized access
</br>

To restrict unauthorized access, the Simple Auth http filter should be added to the blueprint using the following command;

```bash
$ lesscode generate filter:auth
```

which will generate the following code;
According the the following configuration, ny default all the endpoints are blocked, however as an exception the atom instance 'simpleAuthLogin' is bypassed through the authorizer.

```yaml
events:
    http-filter:
        authFirewall:
            urn: simple-auth-authorizer
            config:
                default: false
                endpoints:
                    simpleAuthLogin : true
```

</br>
#### Applying changes to database
<br/>

After you create the endpoints you can generate the new tables for Simple Auth the following command.

```bash
$ lesscode create:schema
```

The command will create new table known as 'users'.

![alt text](./assets/tutorials/schema_simpleauth.png "Schema for the tutorial")

</br>
#### Testing the authorization endpoints
</br>

To test the endpoints first you should run less-code.

```bash
$ lesscode run
```

To register a user you can send a POST request to the API using the following curl command;

```bash
curl -X POST \
  http://localhost:5000/auth/register \
  -H 'content-type: application/json' \
  -d '{
	"userName":"firstuser",
	"firstName":"First",
	"lastName":"User",
	"email":"firstuser@less-code.io",
	"password":"firstuser"
}
```

To test the login for the registered user, you can use the following curl command;

```bash
curl -X POST \
  http://localhost:5000/auth/login \
  -H 'content-type: application/json' \
  -d '{
	"userName":"firstuser",
	"password":"firstuser"
}'
```

The login endpoint will return the following response that includes the JWT if the credentials are correct;

```json
{
    "success": true,
    "response": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE1NTkwNTQyNDMsImZlYXR1cmVzIjp7ImlkIjoyLCJ1c2VyTmFtZSI6ImZpcnN0dXNlciIsImZpcnN0TmFtZSI6IkZpcnN0IiwibGFzdE5hbWUiOiJVc2VyIiwicGFzc3dvcmQiOiJENzU4NzZFRkVGNzYyMDA0QjVBNzgxMjE4MUNBNDcwOSJ9LCJnaXZlbl9uYW1lIjoibGVzcy1jb2RlLmlvIn0.ZZc3vBKEac8Nl1zcrT9T6jVE9Z2rANq_t3Essu5jMjg",
    "error": null,
    "message": null
}
```

The JWT can be sent in the header 'Authorization' to authorize the secured endpoints.

```bash
curl -X GET \
  http://localhost:5000/customers \
  -H 'authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE1NTkwNTQyNDMsImZlYXR1cmVzIjp7ImlkIjoyLCJ1c2VyTmFtZSI6ImZpcnN0dXNlciIsImZpcnN0TmFtZSI6IkZpcnN0IiwibGFzdE5hbWUiOiJVc2VyIiwicGFzc3dvcmQiOiJENzU4NzZFRkVGNzYyMDA0QjVBNzgxMjE4MUNBNDcwOSJ9LCJnaXZlbl9uYW1lIjoibGVzcy1jb2RlLmlvIn0.ZZc3vBKEac8Nl1zcrT9T6jVE9Z2rANq_t3Essu5jMjg'
```

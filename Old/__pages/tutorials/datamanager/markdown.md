## Generating data driven APIs
<br/>
This tutorial shows you how to create a blueprint that will expose APIs that can access the database. To generate various parts of the blueprint in this tutorial, this tutorial focuses on using the command <code>lesscode generate</code> which uses scaffolding that makes it easier to generate your APIs.

Also this tutorial demonstrate how to use Data Manager which is a Less-Code Atom that will enable you to create mappings between your blueprint and your relational database.

<br/>
### Generating a Schema
<br/>

#### Generating a blueprint
<br/>
Less-code APIs are based on blueprints which defines the behavior and the configuration of your APIs. 
You can use the following command to generate a blueprint.

```bash
$ lesscode generate blueprint
```

After you enter this command, Less-code will ask you the following information;

```bash
[?] App name (untitled) : datamanager
[?] Author : awesome developer
[?] Version (1.0) :
[?] Are all the inputs correct (yes) ?
```

After that a blueprint will be created as file called blueprint.yml

```yaml
appName: "datamanager"
author : "awesome developer"
version: "1.0"
```

<br/>
#### Generate the first entity - customer
<br/>
To access the database schemas should be defined in the blueprint that represents tables and columns. You can use the following command to generate a schema.

```bash
$ lesscode generate schema:entity
```

Next the command will request you to enter the following information. In less-code you can categorize entities into bounded contexts, the default value for that is 'data'. Also the command will request you to enter information about the primary key.

```bash
[?] Context model name (data) :
[?] Entity name (untitled) : customer
[?] Primary key name (id) :
[?] Primary key Type (int) :
[?] Primary key auto increment (true) :
[?] Maximum length (10) :
[?] Are all the inputs correct (yes) ?
```

After you confirm the details of the schema, less-code will ask you for the information about the database connection. 

```bash
[?] Please enter the instance name (.\\SQLEXPRESS) :
[?] Please enter the database name (lesscode) :
[?] Please enter the user name (username) :
[?] Please enter the password (password) :
[?] Are all the inputs correct (yes) ?
```

After you run the command, your blueprint will be updated with the following information.

```yaml
schemas:
    data:
        customer:
            id:
                type: "int"
                autoIncrement: true
                primaryKey: true
                maxLength: 10
                isNull: false
```			

```yaml			
config:
    datamanager:
        provider: "mssql"
        mssql:
            sqlInstance: ".\\SQLEXPRESS"
            databaseName: "lesscode"
            userName: "sa"
            password: "intel@123"
```

<br/>
#### Adding fields to entities
<br/>

The previous command will only create one entity with a primary key field. To add more fields you can use the following command.

```bash
$ lesscode generate schema:field
```

For this tutorial you can use the following values;

```bash
[?] Context model name (data) :
[?] Context model name (untitled) : customer
[?] Enter new field name (field) : name
[?] Data type [int, string, float, ref]  (int) : string
[?] Maximum length (10) : 10
[?] Is NULL (true) :
[?] Are all the inputs correct (yes) ?
```

Next your blueprint will be updated with the following information;


```yaml
schemas:
    data:
        customer:
            name:
                type: "string"
                maxLength: 10
                isNull: true
            id:
                type: "int"
                autoIncrement: true
                primaryKey: true
                maxLength: 10
                isNull: false
```			

<br/>
#### Create the second entity - invoice
<br/>

You can also create more entities and add relationships among them. For this tutorial you can create another table and add fields.

```bash
$ lesscode generate schema:entity
```

```bash
[?] Context model name (data) :
[?] Entity name (untitled) : invoice
[?] Primary key name (id) :
[?] Primary key Type (int) :
[?] Primary key auto increment (true) :
[?] Maximum length (10) :
[?] Are all the inputs correct (yes) ?
```

Add an extra field

```bash
$ lesscode generate schema:field
```

```bash
[?] Context model name (data) :
[?] Entity name (untitled) : invoice
[?] Enter new field name (field) : price
[?] Data type [int, string, float, ref]  (int) :
[?] Maximum length (10) :
[?] Is NULL (true) :
[?] Are all the inputs correct (yes) ?
```
<br/>	
#### Create foreign key constraint
<br/>

To create a foreign key relationship, between the tables customer and invoice, you can run the fillowing command;

```bash
$ generate schema:ref
```

To add a foreign key, it will input an entity and a reference entity, a field name in the reference entity and the id of the reference entity. For this tutorial you can enter the following information.

```bash
[?] Context model name (data) :
[?] Entity name (untitled) : customer
[?] Enter new field name for the foreign key (field) : invoiceid
[?] What is the reference entity : invoice
[?] Reference data type [onetoone, manytoone] (onetoone) : manytoone
[?] Reference column (id) :
[?] Are all the inputs correct (yes) ?
```

After running the command, the customer entity will be updated with the following information;

```yaml
customer:
	invoiceid:
		type: "ref"
		refClass: "invoice"
		refType: "manytoone"
		refColumn: "id"
	name:
		type: "string"
		maxLength: 10
		isNull: true
	id:
		type: "int"
		autoIncrement: true
		primaryKey: true
		maxLength: 10
		isNull: false
		
```	

### Generating your endpoints

<br/>
#### Create an endpoint to get all the customers
<br/>

To create an endpoint that will display all the customers you can use this command;

```bash
$ lesscode generate view:datamanager:read
```

When you create an endpoint, you are creating an instance of an atom 'datamanager'. Therefore, first you have to enter the name of the instance. The next inputs are required to configure the atom. After you enter the route, and the HTTP method, the command will ask whether the result should consist of one item or a list, and if you need to add a filter you can specify that.

```bash
[?] Instance name (readOperation) : getAllCustomers
[?] Entity name (untitled) : customer
[?] Route (/datamanager/read) : /customers
[?] Method (GET) :
[?] Retrieve single item (true) : false
[?] Filter condition () :
[?] Are all the inputs correct (yes) ?
```

The command will generate the following configuration in the bluprint.

```yaml
events:
    http:
        getAllCustomers:
            route: "/customers"
            method: "GET"
            urn: datamanager
            config:
                operation: read
                entity: "customer"
                one: "false"
                where: ""
```			

<br/>
#### Create an endpoint to a customer by id
<br/>

To retrive one customer from the database, you can use the same command and configure the atom instance differently.

```bash
$ lesscode generate view:datamanager:read
```

In less-code you can pass query parameters to the filter. The following inputs show you how to do that.

```bash
[?] Instance name (readOperation) : getCustomerById
[?] Entity name (untitled) : customer
[?] Route (/datamanager/read) : /customers/@id
[?] Method (GET) :
[?] Retrieve single item (true) :
[?] Filter condition () : id = {{id}}
[?] Are all the inputs correct (yes) ?
```

The command will add the following code to your teml file.

```yaml
events:
    http:
        getCustomerById:
            route: "/customers/@id"
            method: "GET"
            urn: datamanager
            config:
                operation: read
                entity: "customer"
                one: "true"
                where: "id = {{id}}"

				
```			

<br/>
#### Create an endpoint to insert a customer
<br/>

To create an endpoint to insert a customer, you can use the following command.

```bash
$ lesscode generate view:datamanager:insert
```


```bash
[?] Instance name (insertOperation) : insertCustomer
[?] Entity name (untitled) : customer
[?] Route (/datamanager/insert) : /customer
[?] Method (POST) :
[?] Are all the inputs correct (yes) ?
```

After you enter the above information. The following code will be added.

```yaml
events:
    http:
        insertCustomer:
            route: "/customer"
            method: "POST"
            urn: datamanager
            config:
                entity: "customer"
                operation: insert
				
```			

### Update the Database

<br/>
#### Applying changes to database
<br/>

After you create your blueprint, you can run the following command to create a database and the tables.

```bash
$ lesscode create:schema
```

The command will create the following tables

![alt text](./assets/tutorials/schema_datamanager.png "Schema for the tutorial")

<br/>
#### Testing the changes
<br/>

Finally you can run less-code server and test your endpoints.

```bash
$ lesscode run
```
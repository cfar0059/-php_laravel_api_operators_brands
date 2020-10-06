# PHP Developer Test Task

### Introduction
With this test we want to get an idea of your proficiency in backend related web development technologies. We will give you a task specification below and you are free to use whatever PHP libraries, frameworks etc. you consider as useful to implement it together with SQL database (preferably MySQL or SQLite). You shall provide us with a hosted git repository of your resulting work including a readme file to describe the required steps to deploy it locally.

### Task
Implement REST API without authentication with following endpoints:

1. Add new Operator (name, url, active 0/1, date)
2. Add new Brand related to the Operator (name, url, operator_id, active 0/1, date)
3. Update details of the Operator
4. Update details of the Brand
5. Collect a list of brands (filter and sort by name, active and date)
6. Collect a list of operators (filter and sort by name, active and date)

### Endpoints
Method	URI	Description

1. GET	api/brands	Collect a list of brands (incl. filtering and sorting)
2. GET	api/operators	Collect a list of operators (incl. filtering and sorting)
3. POST	api/operators	Add new Operator
4. PUT	api/operators/{operator}	Update details of the Operator
5. POST	api/operators/{operator}/brands	Add new Brand for Operator
6. PUT	api/operators/{operator}/brands/{brand}	Update details of the Brand

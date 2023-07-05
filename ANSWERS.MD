Outstaffer

1.A

Given
The requirements of the system that it should store the data from electricity bills. The bill should contain the
customer account number, invoice number, a site identifier, a bill start and  date, corresponding total amount and total electric usage.
When
The system receives an electricity bill
Then
The system should perform the following actions:
* Extract the customer account number, invoice number, site identifier, bill start and end dates, total amount, and total electricity usage (kWh) from the bill.
* Verify that the site identifier is alphanumeric and 10 characters long.
* Store the extracted data in the system's database for future reference.
  Acceptance Criteria:
* The system should be able to extract the required information accurately from the electricity bill.
* The site identifier should be alphanumeric and exactly 10 characters long. If the site identifier failed validation, an error should be raised.
* The data should be stored in the system's database, associating it with the corresponding customer account.
* Add validation to check if the site for siteIdentifier exists throw an error if it doesnt exist.

Technical requirements
Create an endpoint POST `api/v1/billings` that accepts and validate the following data
`customerAccountNumber - string`
`invoiceNumber - string`,
`siteIdentifier - string`,
`billStartDate - date`,
` billEndDate - date`
`totalAmount - numeric`
`totalElectricUsage` - numeric|string

        the endpoint should return a resource in the json format of :

	{
		‘customerAccountNumber’ : 1234XX,
		‘invoiceNumber’ : 1234YYY,
		‘billStartDate’: 24JAN2023,
		‘billEndDate’: 24FEB2023,
		‘totalAmount’: 14000 AUD,
		‘totalElectricUsage`: 1300kWh,
		‘createdAt’ : 25DEB2023
	}
1.B

Given: There are multiple bills that need to be linked to a site based on a matching site identifier. Each site contains the following information:
* Name
* Address
  Additionally, there is a user who is appointed as the site's manager. The user has the following attributes:
* Name
* Can manage multiple sites at any given time.

When: The bills are received and need to be linked to their respective sites based on the matching site identifier.
Then: The system should perform the following actions:
* Retrieve the site information (name, address) associated with the site identifier mentioned on each bill.
* Associate the bill with the corresponding site based on the matching site identifier.
* The system can also assign a site manager user.

Technical requirements:

    create a `site` table on which it is related to the `billing` table via `site_identifier` and the `site` table should have columns, `name`, `address`, 'identifier` and `user_id` foreign key that is nullable.

    create a user table with the following columns `name` and should have a one to many relationship with site table.

1.C

GIVEN: The system has a functionality to display a field for selecting a month.

WHEN: a user selects a month.

THEN: the system should list the user's bill invoice numbers that end in the selected month.

A.C

Upon selecting a month, the system should retrieve and display a list of bill invoice numbers that end in that month.

Technical Requirements:
Create an endpoint GET `api/v1/billing?month=may`, the endpoint should accept a query parameter of `month`, validate this query param value in the backend is it is valid month string. this should return a collection of billing `invoice numbers` only.

    e.g:
    {
        'january` : ['NV-21-12-009', 'NV-21-12-002', 'NV-21-12-012']
    }

1.D

Given: The system has site details stored in its database.
When: A user requests to view the details for a specific site.
Then:  The system should perform the following actions:
- Retrieve the site details for the given site and add a calculation of average yearly total amount from associated site's billing data and display then to the user.

A.C.
The user should be able to view the sites data with average yearly total amount.

Technical requirements:
Create a GET `api/v1/sites/{siteId}` endpoint to retrieve the data of a site and return a  json resource in this format.

    `{
        siteId: 1337,
        siteName:  Max Verstappen.
        siteAddress: 1337 Lewis Hamilton st. Austria
        yearlyAverageTotalAmount: 133,777,000Euro
    }`

1.E


Given: The system has site details stored in its database.
When: A user(site manager) request for a list of site it manages.
Then:  The system should perform the following actions:
- retrieve the list of site managed by a user.
- each site should have name, address and calculate the totalAmount and totalElectricUsage each sites from latest billing.

A.C
A user should be able to retrieve all the site it manage with site details with totalAmount and totalElectricUsage.

Technical requirements:

    Create a GET `api/v1/users/{userId}/sites` endpoint, this should return a resource in format.

    `{
        sites: [
            {siteName: Max verstappen, siteAddress: 123 Lewis Hamiton st, latestTotalAmount: 100, latestTotalElectricUsage: 10 kwh},
            {siteName: Sergio Perez,  siteAddress: 456 F. Alonso, latestTotalAmount: 90, latestTotalElectricUsage: 20 kwh},
            {siteName: Carlos Sainz, siteAddress: Ferrai Lose St., latestTotalAmount: 990, latestTotalElectricUsage: 30 kwh}
        ]
    }`


2.A

    CREATE TABLE users (
        id INT PRIMARY KEY,
        name VARCHAR(255)
    );

    CREATE TABLE sites (
        id INT PRIMARY KEY,
        name VARCHAR(255),
        address VARCHAR(255),
        identifier VARCHAR(255),
        user_id INT NULL,
        FOREIGN KEY (user_id) REFERENCES user(user_id)
    );

    CREATE TABLE billings (
        id INT PRIMARY KEY,
        customer_account_number VARCHAR(255),
        invoice_number VARCHAR(255),
        site_identifier VARCHAR(255),
        billing_start_date DATE,
        billing_end_date DATE,
        total_amount VARCHAR(255),
        electricity_usage VARCHAR(255)
    )`;

    2.B
       1.c
        SELECT * FROM billings
        WHERE MONTH(billing_end_date) = MONTH($monthFromRequest);

       1.d
        SELECT sites.*, SUM(billings.total_amount)/12 as avgYearlyTotalAmount from sites join billings on billings.site_identifier = sites.identifier;

       1.e
        SELECT s.name, s.address, b.total_amount, b.electricity_usage
        FROM sites s
        JOIN billings b ON s.identifier = b.site_identifier
        JOIN (
            SELECT site_identifier, MAX(billing_end_date) AS latest_date
            FROM billings
            GROUP BY site_identifier
        ) latest ON b.site_identifier = latest.site_identifier AND b.billing_end_date = latest.latest_date;


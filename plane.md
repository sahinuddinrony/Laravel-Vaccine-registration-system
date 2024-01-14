
## Vaccine registration system

you will develop a partial implementation of a **'Vaccine registration system'**. 

**Features**

# Registration page for users with:
    -NID, email, phone number, name
    -Select vaccine center 

Vaccine centers can be added only by Seeders. No need to implement a CRUD for it. Every vaccine center will have a 'daily limit'. 

# Schedule vaccination date:
    -Daily at 9 PM
    -Select users who registered first (consider vaccine center limit)
    -Send Email notification (Async job)
    -Skip weekends (Sunday-Thursday)
# User's will have the following status:
    -Not vaccinated
    -Scheduled
    -Vaccinated
# Bonus task:
    -Users List show with filter based on status and vaccine center (using FilamentPHP)

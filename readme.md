# CRUD-laravel
A simple CRUD on Laravel that uses a CSV file to store the data and currently has only create and read function.
# Create record
    
    GET FORM
    api: /new
    controller function: RecordController@getNew
    display view: formdata.new
    
    POST FORM
    api: /new
    controller function: RecordController@postNew
    operation: Record insertion to the file and return error/success message 
    redirect url: /new

# View records
    
    api: /view
    controller function: RecordController@getView
    display view: formdata.view
    operation: Fetch all records and return paginated data

# Data Model
    custom class: CSV
    filename: CSV.php
    namespace: App
    location: app/CSV.php
    This is a custom made class that opens (or creates if not exist) a file of given name on given location at "a+" mode.
    isOK() method returns a boolean denoting if the file was successfully opened or not.
    The records are fetched and stored in an array which can be accessed publicly using the all() method.
    Deletion and update can be done with the index(or line number) using delete() and update() method.
    Insertion of a new item can be done using the add() method. 
    commit() method must be called for the changes to be written on the file.
    
# Client side validation

    Client side validation in the new entry form includes use of jquery to add 'required' attribute,defining type of input field as 'email' and masking of inputs fields like phone numbers, date of birth.
    
# Server side validation

    An private array of keys, indicating which fields are required and which are not, is used to validate if all the required fields are received.The private method validateRequiredFields() of the Record controller performs the job of validation.

# View heirarchy
    Root view: template.blade.php
        (contains the header and extends menu.blade.php and is included in all other subviews.)
    included view: menu.blade.php
        (contains the left navigation bar that is to be seen on every page with other template.)
    extended views: 
        location: formdata/
        views: new.blade.php and view.blade.php
        (contains the page specific content,toolbar, javascript and css.)

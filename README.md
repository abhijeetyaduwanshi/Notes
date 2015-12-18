Project name: Note taking application
Author: Abhijeet Yaduwanshi
Project for: Web site app development course.
Skills used: PHP, File system(data serialization and unserialization), HTML- 5, CSS and Bootstrap.

The Notes taking application is a Php crud application(4 operations to perform i.e. Create, Read/View, Edit/Update, Delete) with data serialization and unserialization in a file system.
With notes taking application (an individual or a team) can take notes for personal or professional use, in which we can save notes subject, author, body and priority of a note.
Based on the priority of a particular note, the note can be differentiated from one another.

The data stored in the file is in the form or array where data from each row is serialized and saved with a auto generated id. Here the id is the key and the data in the row is value to the key.
while fetching the data the data in the file is pulled up with that particular key with value and then manipulated accordingly.

The unique part of the application is that the notes saved in the application have a priority column which have values of LOW MEDIUM AND HIGH.
when we have a list of all the notes on the index page the notes have a different color based on their priority as BLACK BLUE AND RED respectively.

There are 5 pages in the application: INDEX, CREATE, VIEW, EDIT AND DELETE.
Index page: The index page have the application name create button, table of all notes.
Each row represent a note with auto generated Id, note subject, author, body and priority of the notes, along with this each note have a view button in the action column which takes us to the show page.

Create page:
The create page have 4 fields (required) with subject of the note,author of the note, body of the note and priority of the note. If the fields in the create page is left empty then the create page comes again with error message as all the fields are required.
When clicked save note the note will be saved in the file and then a review pages comes up for the user to review the new created note later on it will be displayed in the notes table on the index page.

View page:
The view page can be accessed with the view button in the action column. The view page will have the particular note with id, subject, author, body and priority of the note along with this there will be two other options as edit note, delete note and also a home button.
When clicked go home this will take us to the index page.
A perticular note can be viewed in detail with entering url in the address bar with id parameter. If the parameter is wrong then a error page will come up.

Edit page:
The edit page comes when we click edit button in the view page. The already read note will be in the fields in the edit page and where we can save it as it is or edit and update it.
If the fields in the edit page is left empty the edit page comes again with error message as all the fields are required. When clicked save note the note will be updated in the file and then a review pages comes up for the user to review the edited note later on it will be displayed in the notes table on the index page.
The user can not access the edit page through entering url in the address bar of the browser because we need to select a perticular note to edit it which can be done with application and not with direct url.

Delete page:
The delete page comes when we click the delete note option on the view page. This will take us to the delete note page with the note we have selected, a confirmation page comes up with the note and askes the user to confirm the deletion as the note once deleted is deleted for ever.
When selecting delete the note will be deleted and will no longer be the part of the app, if selected no this will take us to home index page.
The user can not access the delete page through entering url in the address bar of the browser because we need to select a perticular note to delete it which can be done with application and not with direct url.

In the coding I have used php code on top followed by the html, css code as to follow the best coding practice.
I have total of 9 code files, 1 data folder with data file in it for data to be stored, 1 project pictures docs file and 1 readme.md file.
I have used Bootstrap for styling in the application.

Development environment:
I have a windows 8.1 dell inspiron 15 laptop.
I have used XAMPP 3.2.2 local development environment on my machine to test the application.
I have used php version 5.6.8.
I have used sublime3 editor.

Installation instructions:
The project zip file is to be downloaded, extracted and save to any of the local development environments htdocs folder to test.

Steps to test the assignment:
1. Run the local developing environment server.
2. Open any web browser of your choice.
3. Go to http://localhost/....../index.php to access the assignment index page.
4. We are on the index page of the assignment with all the notes created earlier.
5. To create a new note click add new notes button on the index page and follow the intermediate stages.
6. To view the details of the note click the view button in the row for that note.
7. To edit the note click edit button on the view page, once done editing save the edited note.
8. To delete the note click delete button on the view page, accept the confirmation and proceed.

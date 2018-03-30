# Library Management System

A Library Management System with PHP and MySQL  
###Purpose of the Project
Analyze, specify, design, implement, document and demonstrate an information
system application to support a library. You are required to use the Classical
Methodology for Database Development. The system should be implemented
using a relational DBMS that supports standard SQL queries. Class administrators
will provide you with information about how to access a college-managed MySQL
server in order to implement your database and the application. The professors
must approve any other alternative implementations. In no circumstances can you
use a tool that automatically generates SQL or automatically maps programming
objects into the database. 
###Comments
I finish PHP and MySQL implementation within three days.  
It is the first time I learn PHP and MySQL. I think it is a good experience for me.  
So minor things I forget to include are mentioned by TA when I was doing the demo.

1. I forget book is no longer on hold after three days
2. I forget the damaged books should be queried as MAX(ReuturnDate) for damaged books report
3. I forget people cannot place a hold request a book if the book has a future requester
4. Final Grade : 95

### Phases 
#####Phase I (Soft copy and hard copy)
The deliverables include:

1. A cover page listing all members in the team with their respective sections
and email addresses and T-square username.
2. Enhanced Entity Relationship (EER) Diagram
3. Information Flow Diagram
4. A list of logical constraints that will be enforced. Do not include any constraints that can be shown in the ER diagram, but rather semantic
business logic related constraints. You are required to include at least three
constraints, although a fully-specified system will probably have more than
that. Constraints that can be specified directly using ER notation will not
count toward the three required. Constraints related to data type are not
accepted as constraints
5. Any assumptions made including explanations.    

Notes:

1. The EER must capture the constraints of the system as much as possible  
whenever applicable, i.e. total participation, super/sub class, weak entities.  
2. The design of your system must satisfy all the constraints. You are allowed  
to make up additional assumptions and constraints as long as they do not  
conflict with the specified constraints and requirements. If possible, those  
additional assumptions and constraints should be included in the ER  
diagram.

You must turn in a hard copy of your report in class. One hard copy should be  
turned in for the entire group, although each group member should upload a  
soft copy on t-square individually. Group numbers will be assigned to the groups  
after they are declared in Phase 1. For all subsequent submissions, please note  
down your Group Number clearly on anything you record or submit.  

#####Phase II (Soft copy and hard copy)

1. Cover Page  
2. Copy of the ER Diagram (either from phase I (with any revisions) or from the  
solution provided)  
3. Copy of the Information Flow Diagram from phase I (either from phase I (with  
any revisions) or from the solution provided)  
4. Relational Schema Diagram (with primary and foreign keys identified,  
referential integrity is shown by arrows)  
5. Create Table statements, including domain constraints, integrity constraints,  
primary keys, and foreign keys  
6. SQL statements for each task (follow the template in the phase II design  
methodology)

Notes: A set of SQL statements may be required in order to complete one task.  
However, in such cases, the last SQL statement should show the output according  
to the specification. Views and nested queries may be used to support the tasks. A  
nested query can be broken down into views to make the query more readable. 

####Phase III  
Prior to the demo, the TA will give guidelines for populating the database with data.  
The database has to be populated with this data set prior to the demo. 5% will be  
deducted from the grade otherwise.  
Implement a working application with all functionality described in this document.  
Your source code should be mailed to the respective TA who grades your project  
by the deadline.  
Deliverables for Phase 3:  
When the deadline for Phase 3 occurs (midnight of April 21st), you will be  
uploading the SQL query text file and all your code on T-square as instructed. 

1. Bring your laptop for the demo.  
Heavyweight option:  
The heavy weight option requires you to develop the entire application as a  
stand-alone application including the front end, menu options and the control  
flow.  
2. Make sure you have a text file (soft copy) with all your SQL queries only  
(This is just in case your implementation doesn't work.)  
3. Working functional application with embedded SQL statements that  
accesses your database (This is your actual application.) 

Lightweight option:  
The lightweight option requires you to do the SQL queries and statements to  
accomplish each task independently.

2. Make sure you have a text file (soft copy) with all your SQL queries only.  
Grading  

The project will consist of three phases (deliverables) as well as a final  
demonstration to the TA.  
Phase I and Phase II of the project are each worth 10% credit.  
Phase III (20% or 5% credit, depending on option):  
Heavy Weight Option (20 %): The students would be required to use the embedded  
SQL feature of MySQL which allows you to embed SQL statements in a Java program  
or web application. (You can use whatever programming language you are  
comfortable with)  
Light Weight option (5 %): The students would be required to demo the SQL  
queries on the MySQL console. They would be required to take the Final exam.  
Final Exam (15 %): This would be only taken by students who have opted for the  
lightweight phase III. Under no circumstances would a heavy weight option student  
be allowed to take the Final.  

#### WampServer
This project is tested on WampServer.

## Contributing

1. Fork
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request

## Credits

*Enmao Diao  
Haitian Sun  
Yuxiao Wu*

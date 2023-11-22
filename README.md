# Online-Discussion-Platform-Milestone-2

Online discussion platform milestone 2 is the continuation of the Online discussion platform milestone 1 that I completed previously. In milestone 2, I expanded the capabilities of the platform by adding more features, for instance, rating, display user location, third party api(direction),captcha, filtering,wishlist,item search,course recommendation,profile,remember me,and contact us.

Technical skills I used to develop milestone 2: HTML,CSS,JavaScript,Bootstrap, CodeIgniter(PHP framework),SQL,MySQL,phpMyAdmin.

1. Rating: Rating is a function which allows users to rate a question. If they think that is a good or interesting question, they can give it a like by pressing the like button under the question. The rating function helps users to consider the value of a question, so that they can use it to decide if they want to spend more time on the question or not.

The following image shows what it looks like when the question is not liked.
![like2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/dbbf060a-b83b-46b9-8483-1077693e1783)

The following image shows what it looks like when the question is liked by the user. 
![like1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/f164c0b4-f60e-4f8c-b7d5-f48a8ecb53f2)

2. Display user location: Display user location is a feature within the “Contact Us” feature. When users leave a comment in the “Contact Us” section, everything will be saved to the database. In addition to the comments and the images from the users, the application will retrieve the users location and log into the database. We want to log users' approximate location with users comments into our database, since location-based information may be useful for the team to analyze users preference for specific regions. This is a useful feature for marketing purposes.

The image below shows the structure of the database table. The last column of the database table records the approximate location of the users when they leave a comment on the “Contact Us” section.
![retrieved_location](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/cb846b60-7168-418e-b49f-dc425ec01bed)


3. Third party api(direction): Third party api(direction) refers to the map navigation feature that I built through using the Google Map API. Most companies state their company address on their website. In my case, I think it could be more creative. In the third party api(direction) feature, I labeled AskItNow’s office location on Google Map. In addition, I also labeled several popular spots in Brisbane, Australia. By picking the popular spots, Google Map API will show the route between the AskItNow office and the selected spot, so that users can have a rough idea of where the company’s office is located.

The image below shows what this feature looks like on the website.
![Location1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/284785d1-f28e-4009-950a-1a444b345009)

The image below shows the route between Queen Street Mall and the company’s office. It gives users a brief understanding of where the company’s office is located through the iconic spot in Brisbane City.
![location2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/4575fbaa-a0a1-4302-a7b1-ed98c54a0bd5)


4. CAPTCHA: Captcha is a security feature which avoids bot attack and scam. I developed the CAPTCHA feature in the create account section during the development in Milestone 2. But for consistency, I introduced this feature within the “create account” section of Milestone 1’s Readme.md. To recap this feature, please take a look at the image below.
![Create_Account_Page](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/ab7381c9-470c-45b9-bdeb-35ff2799c61b)

5. Filtering: Filtering is a function which allows users to filter questions based on the categories. For instance, if the user wants to view computer science questions only, he/she can check the computer science box and click the “submit” button. If he/she wants to view multiple categories, he/she can always select multiple categories before hitting the submit button.

The image below shows how the filtering interface looks like.
![filtering1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/0c027f4f-5b76-4af5-b851-8a9e178264f9)

The image below shows the filtering section, which allows users to select the filtering criteria based on their personal preference. In the image, we selected “business”, “math” and “technology”. Afterwards, we can click “submit” for the result. 

![filtering2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/00dac3f9-b0c8-4a7a-a21a-4aecc3b5e4f0)

The image below shows the filtering outcome from the previous image. As you can see, the results match the categories we selected from the previous step.
![filtering3](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/101e2678-f37a-451b-b52d-26ff52bc5f23)


6. Wishlist: The wishlist allows users to pin the questions they like, so that they can view the pinned questions from the favorite question list, but not searching the questions all over again. 
The image below shows the favorite question page. This page will show all the pinned questions from the user.
![favouriteQuestion1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/39bdc3e4-6e4a-44e0-827f-6a1333fb0fb7)
The image below shows what it looks like when a question is being pinned.
![favouriteQuestion2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/798c9ebc-e5e6-4e3c-af48-8b6588901a07)

The image below shows what it looks like when a question is not pinned. 
![favouriteQuestion3](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/1b920250-1531-46fe-bf38-9d2b605f19b9)

8. Item search: The item search feature is a list of department contacts with the keyword searching capability. Platform users may not find the answers all the time, they may need to consult their professors for suggestions. Instead of searching the contact information outside the website, the platform has the full department contacts. Users can use the input area at the top to search the professor. The item search feature allows partial match, which means it doesn’t require a full match, a partial matching result can also display in the result section. 

The image below shows the full list of the department contacts. 
![departmentContact1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/27cae9b6-1849-47c1-867b-09339a43f739)

The image below shows the matching results are shown in the result section.
![departmentcontact2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/4ccdf81d-7b9f-42d8-852c-f53a5936482c)

The image below shows how partial match works. A row can be counted as qualified, even if there is only one matching character.
![departmentcontact3](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/7a9056d2-1c0d-4d89-9584-ae8527d52193)


8. Course recommendation: The course recommendation is a feature which recommends questions to you base on 2 criterias. The first criteria is personal preference. Personal preference is a section which users need to fill in. By filling in, the system can recommend questions to them based on what they check on the preference list. The second criteria is the likes on each question. The question with more likes will rank higher than the question with fewer likes. 
The image below shows the preference list, users need to fill in the list to make the recommendation feature work. 
![recommendation1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/4f227153-383d-46cc-aabc-64c6410a7758)

The image below shows the recommendation feature home page, it shows all the recommended questions. They are displayed by the criteria mentioned above.
![recommendation2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/66eb16a7-9dca-416e-b77b-aa9848bd45a0)


9. Profile: Profile is a place to view your information, for instance, first name, last name, email address and user name. More importantly, it is a place for you to change your password after you log in to your account. To change your password, you need to go to the “change your password” tab on the left. Once you get into the webpage, you need to enter your original password, new password and confirm your new password. You need to enter your original password, so the system can verify you are the account owner. When you enter everything correctly, it will display the “Your password has changed” screen. Afterwards, you will receive an email from the platform, which lets you know you just changed your password successfully. If you didn’t change your password, you should be aware of this email and use the “forgot password” feature to change your password. 

The image below is how the profile looks like 
![profile_Page](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/f92fbd39-1c3e-471e-942f-1b98633c14d4)

The image below is how the “your information” page looks like
![profile_page2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/e62eb00d-440a-406a-810b-f43fe3bb6af4)

The image below is how the “Change your password” page looks like.
![yourProfile_ChangePW](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/eadbb2a1-c1c9-4fc6-b6a0-6b90686f2397)

The image below shows the “success screen” after the password is being changed successfully
![profile_page_changePW_Success](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/d4829489-69a7-474e-ae4b-066b0127bc8b)

The image below shows the notification email from “AskItNow” once the password is changed.  
![profile_changePW_email_notice](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/96f525a3-c092-459f-bbde-fa17a6fe280f)

10. Remember me: Remember me is a feature within the login home screen. Once you enter all your user credentials, you can decide to check or not check the “remember me” box. When you check the “remember me” box, it means a “Cookie” will be generated. A “Cookie” can store username and password, which will be embedded in the browser, so the user does not need to re-enter their credentials while the “Cookie” is valid. This can make things smooth and efficient. 

This image shows the login home page. Below the “login”button, you can see the “remember me” checkbox is checked.
![rememberMe1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/4b3c415d-5797-4d0a-aa36-ccac4c65b8bc)

This image shows how “Cookies” are present within the browser. When the “Cookie” is created, users credentials are saved within the browser, so users do not need to re-enter their credentials while the “Cookie” is still valid.
![rememberme2](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/aceda49c-da43-4049-a159-192159e3b195)

11. Contact us: “Contact us” is a feature which allows users to leave comments and suggestions. By having such features, it can help the platform to continue its improvements.
The image below shows how the “contact us” interface looks like. 
![contactUS1](https://github.com/jefjefhui/Online-Discussion-Platform-Milestone-2/assets/73283123/cb85106d-3173-4aa8-9c1f-2bf046df7eaf)






















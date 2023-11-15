# Crypto_info_app
Crypto coin market reporting app.  Developed as a technical test displaying Vue3 and Laravel API development skills.

The following is the original technical test request.

#Technical Assessment

## Project Description
You are tasked with creating a web application that displays	information about the latest 
cryptocurrency prices. You will use a publicly open REST API to fetch the data and display it 
on the frontend.
Instructions	:
1. Create a small web application that integrates with a publicly open REST API using 
Laravel, Vue JS, Nuxt JS (or similar framework), and Tailwind.
2. The web application should display data retrieved from the REST API and allow users 
to interact with it throug	h the frontend.
3. You have a maximum of four hours to complete the assessment.
4. Submit your code in a GitHub repository along with a covering letter explaining your 
thought process and design choices.
Requirements
1. You should use Laravel to build the backend API.
2. You should use Vue JS and Nuxt JS or similar framework for the frontend.
3. You should use Tailwind for the styling of the application.
4. The application should display the top 10 cryptocurrencies by market cap on the 
homepage.
5. The user should be able to click 	on a cryptocurrency to see more detailed 
information, such as price, volume, and market cap.
6. The application should have a search functionality that allows the user to search for 
a specific cryptocurrency by name or symbol.
7. The application should be respon	sive and work on both desktop and mobile devices.
## Expectations	:
1. Your code should be well	- structured, efficie	nt, and readable.
2. Your frontend design should be responsive, user	- friendly, and visually appealing.
3. Your code should incorporate best practices for security and error handling.
4. Your REST API integration should be functional and error	- free.
5. Your code should	be thoroughly commented and documented.​
## API :
You should use the 	CoinGecko API	to fetch the latest cryptocurrency data.
You shou ld use the following API endpoints:
• /coins/markets	: This endpoint returns information about the top cryptocurrencies by 
market cap.
• /coins/{id}	: This endpoint returns detailed information about a specific 
cryptocurrency.
You can find more information about these endpoints in the 	CoinGecko API documentation	.
## Deliverables	:
You should submit a GitHub repository containing your code and instructions 	on how to get 
the application up and running. The repository should include:
1. Backend API code built with Laravel
2. Frontend code built with Vue JS and Nuxt JS or similar framework
3. Instructions on how to set up the application locally
4. A README file with a brief description of the application, how to use it, and any 
other relevant information.

## Setup
1. Navigate to folder crypto-api/
2. Edit .env file: Change the database information
3. Run: `composer install`
4. Migrate Database: Run `php artisan migrate`
5. Run seed `php artisan db:seed --class=CoinSeeder`
6. Start application: `php artisan serve --port=8001` // Different environments default to different port numbers so force it to use port 8001
7. Navigate to folder crypto-app/
8. Run: `npm install`
9. Run: `npm run dev` at this stage.
10. Et voila...




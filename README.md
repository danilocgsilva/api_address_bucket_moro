# API ADDRESS BUCKET MORO

Store endpoints from apis.

## To develop

The aplication is beign developed using docker. There are two container: one for application and another for the database. Both have the notwork mode to *host*, so it is good to interates to the development server for frontend.

## Technical: what you will found here?

The application is based on Laravel 12.

It uses the coupled frontend, using the default suggestion from Laravel: Tailwindcss.

In the listing views, you can see a entries table, having in the same row actions buttons both to edit or delete item. As well the required inline javascript the ask for user confirmation before deletion.

In the web routes, there are a relationship between models. I used a native resource from Laravel to suggests hierarquical route paths.

# Build Larabook From Scratch *(Laravel 5.1)*

Been using Laravel for some time, and now feel ready to build a well-architected application from scratch? Excellent! Together, let's build a light version of Facebook, called Larabook.

## Lessons summary

### 1. [The Virtual Machine](https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/1)

To begin our new project, let's setup a virtual machine, using Vagrant and Laravel Homestead.

**Please note: I rebuilt it with Laravel 5.1, so the projet in this repository may be a little bit different**

### 2. [Dependencies](https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/2)

There are a number of dependencies that we'll need to pull in for this project. While even a few years ago, this might have been a pain, luckily that's no longer the case, thanks to Composer.

**Please note: The only dependency I pulled in is Jeffrey’s Generators, for the rest I decided to use Laravel 5.1 built-in features.**

### 3. [Database Configuration and Sequel Pro](https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/3)

In this lesson, let's get connected to our database, and then figure out how to access it from a GUI, like Sequel Pro.

**Please note: The only thing I had to do was to edit `.env` file. It is not committed, of course.**

### 4. [The Master Page](https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/4)

Although we won't focus too much on design, naturally, we need something nice and simple to look at. So, let's begin that process by leveraging Twitter Bootstrap, and setting up our first master/layout page.

### 5. [Designing the Home Page](https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/5)

This includes some basic design boilerplate work. Let's focus on the navbar and homepage in this episode.

**Please note: I used `.scss` instead of `.sass` stylesheet file.**

### 6. [Gulp, Sass and Autoprefixing](https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/6)

Let's put a system into place, that will automatically watch our Sass files for changes, compile them, and then autoprefix any relevant CSS3. We'll use the excellent Gulp tool to allow for this.

**Please note: I've only edited `gulpfile.js`. All done with elixir.**

### 7. [Registration with BDD](https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/7)

Naturally, before a user can begin posting status updates, they first need to register for Larabook. Let's use Codeception to help drive and test this process.

**Please note: I've used Laravel built-in authentication. I pulled `laravelcollective/html` and used forms from Laravel 5.0.**

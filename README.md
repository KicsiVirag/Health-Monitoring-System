# Health Monitoring System: A Convenient Tool for Managing Your Health (2024)
### Made by: Virág Kiss and Noémi Polonyi

## Introduction

Welcome to the Developer Documentation of the **Health Monitoring System**! This document helps you familiarize yourself with and effectively use the Health Monitoring System.

This document provides guidance for developing and integrating our application, which is a web application built specifically with **Vue.js**, **Bootstrap**, **JavaScript**, and **PHP**.

Have you ever wanted a simple way to track your health data and activities? That's where a health monitoring system comes in handy! This system is like a personal health assistant that helps store and manage important health-related information.

We believe our software is close to everyone because nowadays one of the most important topics is our health. A conscious lifestyle is the key to a happy, healthy, and long life, so it's important for everyone to take this topic seriously. Our health monitoring system will help you successfully achieve your goals for a healthier and happier future. Health is the foundation for people to reach their true potential, allowing them to realize their capabilities.

First, let's talk about what this system can do. It allows you to store all your health data in one place. This includes things like your daily calorie intake, daily step counts, and activities performed. Based on your health data, the system can calculate the ideal calorie intake and provide assistance in maintaining a healthier lifestyle. No more digging through piles of paper or trying to remember everything.

One of the best features of this system is activity tracking. You can track your workout routines, daily step counts, and even your sleep habits. This can be extremely useful if you're trying to stay fit or if your doctor has recommended certain lifestyle changes.

In summary, the health monitoring system is a fantastic tool for anyone looking to monitor their health. By being able to store your health data, track your activities, and remind you of important tasks, it's like having your own health assistant. Say goodbye to the hassle of managing health information – let the monitoring system handle it for you!

When the World Health Organization (WHO) was founded in 1948, it defined health as follows:
> "Health is a state of complete physical, mental, and social well-being, and not merely the absence of disease or infirmity."

## System requirements
SOFTWARE REQUIREMENTS:
* **Operating Syste**m: The application can run on macOS and Windows operating systems (tested).
* **Web Browser**: The latest versions of Google Chrome and Mozilla Firefox browsers are recommended.
* **Server-Side**: Laravel 10x or newer, PHP 8.0 or newer.
* **Database**: MySQL 8.0 or newer version is required for storing and managing data.

HARDWARE REQUIREMENTS:
* **Processor**: A minimum of 2 GHz or faster processor is recommended.
* **Memory**: At least 2 GB of RAM is recommended.
* **Storage**: At least 100 MB of free space is required for installing the application.
* **Display**: A display with a minimum resolution of 1280x800 pixels is recommended.

## Detailed steps to install and configure the software
1. SYSTEM REQUIREMENTS VERIFICATION:
    - Please ensure that the system meets the hardware and software requirements necessary to run our software. Please verify the hardware and software requirements listed above and ensure that the system is properly configured!

2. START VIRTUAL ENVIRONMENT:
    - To run the backend, you will need an OVA file, which you can install and run using the Oracle VM VirtualBox application. You can find the link to download the OVA file here: [link](https://drive.google.com/file/d/160cEV0HvcCHcwbPWybhPYtLNjbCSdK-2/view).
    - During configuration, it's advisable to set the following parameters:
        - Base memory: 3072 MB (3GB RAM)
            - Network cards:
                - **Card 1**: NAT (Advanced → Port forwarding: Then, set the following port forwarding rules):
                     
                        | Name   | Protocol   | Host Port   | Guest Port   |
                        |--------|------------|-------------|--------------|
                        | Rule 1 | TCP        | 8881        | 8881         |
                        | Rule 2 | TCP        | 8882        | 8882         |
                        | Rule 3 | TCP        | 8888        | 8888         |
                        | SSH    | TCP        | 22          | 22           |

                - **Card 2**: Host-only card
    - After this, start the virtual machine:
        - Once started, you will need to provide the login credentials:
            - **Username**: neu
            - **Password**: docker1234

3. CLONING GITLAB REPOSITORY:
    - Next, download the source code of the project from the following GitLab repository. Then, copy the project files to the desired installation location on your virtual machine or computer.
    - Clone the following link using GitBash as follows:
        - Navigate to the directory where you want to store the program's source code (cd command) - in Visual Studio Code.
        - Then issue the cloning command: **``` git clone http://gitlab.neumann-bp.edu.hu/j-t-kprojekt/egeszsegfigyelo-rendszer-vizsgaremek.git . ```**

4. RUNNING BACKEND:
    - To run the backend in the background, you need to follow these steps:
        1. Launch the program called Visual Studio Code.
        2. Click on the 'Open a Remote Window' button in the bottom left corner and select 'Connect to Host'.
        3. Enter neu@localhost in the popup window.
        4. Next, determine the type of operating system. In our case, it should be Linux.
        5. Then enter the corresponding password: docker1234.
        6. After that, create a folder where the backend files will be placed. Copy the Laravel folder cloned from the repository into this folder.
            - Creating a new folder: Ctrl + ö (new terminal)
            - mkdir FolderName
        7. Issue the following commands to run the backend - open a terminal in VSCode (Ctrl + ö):
            - Navigate to the Laravel folder → cd Laravel
            - **``` cp .env-example .env ```** → Copy the .env file
            - **``` docker compose build ```** → This step is important during the first start. If it is not found on the machine, it will be done automatically when the container starts.
            - **``` docker compose up -d ```** → Starts in detached mode, meaning container output is detached from the console, allowing it to continue being used.
            - **``` docker compose exec app composer install ```** → Generates the vendor folder.
            - **``` docker compose exec app fish ```** → Start the Fish shell in a specific container using this command.
            - **``` php artisan migrate:fresh  --seed ```** → Runs migration files - displays and uploads data to the database.

5. RUNNING AND CONFIGURING THE FRONTEND:
    - Next, the focus will be on starting and setting up the web server. Click on the "File" tab in the top navigation bar, then select the "Open Folder" option, and navigate to the folder where you downloaded the project. Once selected, the program will load the chosen folder. After this, issue the following commands in a new terminal:
        - First, open a new Visual Studio Code window.
        - **```cd Frontend```** → Navigate to the frontend folder.
        - **```npm i```** → When you run this command in a Node.js project root directory, npm reads the package.json file, which contains the list of dependencies and their versions for the project. – **```npm i```** (in Frontend folder)
        - Then run the **```npm run dev```** command. This command executes a script defined in the package.json file with the name "dev", which runs "vite --host".
            - After this, you can access our website via [http://localhost:5173].
            - If you wish to access the database, you can do so at [http://localhost:8882].
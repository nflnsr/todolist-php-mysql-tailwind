<?php

$host = 'sql311.epizy.com';
$usr = 'epiz_33133900';
$pwd = 'nauwasyours';
$db = 'epiz_33133900_todolist';

$conn = mysqli_connect($host, $usr, $pwd, $db);

$data = mysqli_query($conn, "SELECT * FROM todolist_apps");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="/static/hello/style.css?{% now 'U' %}"/> -->
    <title>Todolist by Nau</title>
    <link rel="shortcut icon" href="https://i.ibb.co/qB4GbS9/final-logo-blog.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-cyan-500 via-indigo-400 to-blue-500 relative">
    <header class="">
        <div class="bg-blue-300 py-6">
            <div class="bg-green-300 text-center w-2/3 mx-auto lg:w-1/6 md:ml-28 md:w-1/5 sm:w-2/5">
                <h1 class="text-3x1 font-bold text-2xl">Naufal Nasrullah ツ</h1>
            </div>
        </div>
    </header>

    <main class="bg-violet-300 mx-auto border-8 border-red-300 md:w-4/5 xl:w-3/5 mt-8">
        <div class="">
            <h1 class="text-2xl text-center">to do list Apps</h1>
        </div>
        <div class="">
            <table class="border-collapse text-center p-2 bg-gray-100 border border-slate-500 mx-auto">
                <thead class="">
                    <tr class="">
                        <th class="sm:px-3 px-2 bg-gray-300 border border-slate-600">No</th>
                        <th class="sm:px-6 px-4 bg-gray-300 border border-slate-600">Task</th>
                        <th class="sm:px-5 px-3 bg-gray-300 border border-slate-600">Priority</th>
                        <th class="sm:px-6 px-3 bg-gray-300 border border-slate-600">Date Created</th>
                        <th class="sm:px-6 px-2 bg-gray-300 border col-span-1 border-slate-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data_tasks = mysqli_fetch_array($data)) {
                        echo "<tr class=''>";
                        echo "<td class='border border-slate-600'>". $no++ ."</td>";
                        echo "<td class='border sm:px-2 border-slate-600'>". $data_tasks['task'] ."</td>";
                        echo "<td class='border border-slate-600'>". $data_tasks['priority'] ."</td>";
                        echo "<td class='border border-slate-600'>". $data_tasks['date_created'] . "</td>";
                        echo "<td class='border border-slate-600 py-1 sm:px-1 sm:flex'>
                              <button class='w-2/3 mb-1 sm:mb-0 sm:px-4 sm:mx-1 bg-green-300'><a href='edit.php?id=$data_tasks[id]'>edit</a></button>
                              <button class='w-2/3 sm:px-2 bg-red-300 px-3'><a class='flex justify-center' href='delete.php?id=$data_tasks[id]'>remove</a></button>
                              </td>";
                        echo "</tr>";
                     }
                ?>

                </tbody>
            </table>
        </div>
    </main>
    <div class="bg-gray-200 mx-auto border-8 border-green-300 xl:w-3/5 md:w-4/5 md:px-2 mt-8">
        <form id="form" class="hidden" action="add.php" method="post">
            <div class="sm:flex sm:justify-center mb-4 sm:gap-1 sm:px-2 mt-4 lg:mt-8">
                <div class="md:text-center lg:flex lg:items-center sm:w-1/3 sm:block gap-1 lg:gap-0 mb-2">
                    <div class="my-auto flex justify-center lg:justify-start lg:min-w-fit">
                        <label class="block sm:hidden" for="task">New Task</label>
                        <label class="hidden sm:block" for="task">New Task :</label>
                    </div>
                    <div class="sm:block flex lg:flex-grow lg:pl-1 justify-center">
                        <input class="w-2/3 sm:w-full lg:px-1 lg:text-left text-center  border-violet-200 rounded-lg border-4"
                            type="text" name="task" id="task-form">
                    </div>
                </div>
                <div class="md:text-center lg:flex lg:items-center sm:w-1/3 sm:block gap-1 lg:gap-0 mb-2">
                    <div class="my-auto flex justify-center lg:justify-start lg:min-w-fit">
                        <label class="block sm:hidden" for="task">Priority</label>
                        <label class="hidden sm:block" for="task">Priority :</label>
                    </div>
                    <div class="sm:block flex lg:flex-grow lg:pl-1 justify-center">
                        <input class="w-1/3 sm:w-full lg:px-1 lg:text-left text-center border-violet-200 rounded-lg border-4"
                            type="text" name="priority" id="priority-form">
                    </div>
                </div>
                <div class="md:text-center lg:flex lg:items-center sm:w-1/3 sm:block gap-1 lg:gap-0 mb-2">
                    <div class="my-auto flex justify-center lg:justify-start lg:min-w-fit">
                        <label class="block sm:hidden" for="task">Date Created</label>
                        <label class="hidden sm:block" for="task">Date Created :</label>
                    </div>
                    <div class="sm:block flex lg:flex-grow lg:pl-1 justify-center">
                        <input class="w-2/4 sm:w-full lg:px-1 lg:text-left text-center border-violet-200 rounded-lg border-4 bg-gray-100" type="text"
                            name="date_created" id="date-form">
                    </div>
                </div>
            </div>
            <div class="text-center mb-6 lg:mb-8">
                <input type="submit" name="Submit" value="Submit"
                    class="bg-blue-400 hover:bg-blue-300 cursor-pointer px-5 py-2 rounded-lg">
            </div>
        </form>
    </div>
    <div class="bg-blue-500 mx-auto border-8 border-blue-300 md:w-4/5 xl:w-3/5 mt-8 rounded-2xl">
        <div onclick="showForm()" class="mx-auto w-full">
            <button class="w-full hover:bg-blue-400 text-white font-bold py-2 px-4 rounded-lg">Add Task</button>
        </div>
    </div>
    
    <footer id="footer">
        <div class="bottom-2 w-full fixed">
            <h6 class="text-center text-sm text-gray-300">Copyright © 2023 Naufal Nasrullah ∙ All Rights Reserved</h6>
        </div>
    </footer>
 

    <script>
        function showForm() {
            let x = document.getElementById("form");
            if (x.className === "hidden") {
                x.className = "block";
            } else {
                x.className = "hidden";
            }
        }

        window.addEventListener("resize", function () {
            if (window.matchMedia("(min-height: 500px)").matches) {
                document.getElementById("footer").style.display = "block";
            } else {
                document.getElementById("footer").style.display = "none";
            }
        })
    </script>
</body>
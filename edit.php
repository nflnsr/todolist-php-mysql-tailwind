<?php

$host = '';
$usr = '';
$pwd = '';
$db = '';

$conn = mysqli_connect($host, $usr, $pwd, $db);

if (isset($_POST['Submit'])) {
  mysqli_query($conn, "UPDATE todolist_apps SET task = '$_POST[task]', priority = '$_POST[priority]', date_created = '$_POST[date_created]' WHERE id = '$_GET[id]'");
  header("Location: index.php");
}

$datas = mysqli_query($conn, "SELECT * FROM todolist_apps WHERE id=$_GET[id]");
$data = mysqli_fetch_array($datas)

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Task</title>
  <link rel="shortcut icon" href="https://i.ibb.co/qB4GbS9/final-logo-blog.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-cyan-500 via-indigo-400 to-blue-500">
    <header>
        <div class="bg-blue-300 py-6">
            <div class="bg-green-300 text-center w-2/3 mx-auto lg:w-1/6 md:ml-28 md:w-1/5 sm:w-2/5">
                <h1 class="text-3x1 font-bold text-2xl">Naufal Nasrullah ツ</h1>
            </div>
        </div>
    </header>

  <main class="bg-violet-300 mx-auto border-8 border-red-300 xl:w-3/5 md:w-4/5 mt-8">
    <div class="">
      <h1 class="text-2xl text-center">to do list Apps</h1>
    </div>

  </main>
  <div class="bg-gray-200 mx-auto border-8 border-green-300 xl:w-3/5 md:w-4/5 md:px-2 mt-8">
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <div class="sm:flex sm:justify-center mb-4 sm:gap-1 sm:px-2 mt-4 lg:mt-8">
        <div class="md:text-center lg:flex lg:items-center sm:w-1/3 sm:block gap-1 lg:gap-0 mb-2">
            <div class="my-auto flex justify-center lg:justify-start lg:min-w-fit">
                <label class="block sm:hidden" for="task">New Task</label>
                <label class="hidden sm:block" for="task">New Task :</label>
            </div>
            <div class="sm:block flex lg:flex-grow lg:pl-1 justify-center">
                <input class="w-2/3 sm:w-full lg:px-1 lg:text-left text-center  border-violet-200 rounded-lg border-4"
                    type="text" name="task" id="task-form" value="<?php echo $data['task']; ?>">
            </div>
        </div>
        <div class="md:text-center lg:flex lg:items-center sm:w-1/3 sm:block gap-1 lg:gap-0 mb-2">
            <div class="my-auto flex justify-center lg:justify-start lg:min-w-fit">
                <label class="block sm:hidden" for="task">Priority</label>
                <label class="hidden sm:block" for="task">Priority :</label>
            </div>
            <div class="sm:block flex lg:flex-grow lg:pl-1 justify-center">
                <input class="w-1/3 sm:w-full lg:px-1 lg:text-left text-center border-violet-200 rounded-lg border-4"
                    type="text" name="priority" id="priority-form" value="<?php echo $data['priority']; ?>">
            </div>
        </div>
        <div class="md:text-center lg:flex lg:items-center sm:w-1/3 sm:block gap-1 lg:gap-0 mb-2">
            <div class="my-auto flex justify-center lg:justify-start lg:min-w-fit">
                <label class="block sm:hidden" for="task">Date Created</label>
                <label class="hidden sm:block" for="task">Date Created :</label>
            </div>
            <div class="sm:block flex lg:flex-grow lg:pl-1 justify-center">
                <input class="w-2/4 sm:w-full lg:px-1 lg:text-left text-center border-violet-200 rounded-lg border-4 bg-gray-100" type="text"
                    name="date_created" id="date-form" value="<?php echo $data['date_created']; ?>">
            </div>
        </div>
      </div>
        <div class="text-center mb-6 lg:mb-8">
          <input type="submit" name="Submit" value="Submit"
            class="bg-blue-400 hover:bg-blue-300 px-4 py-2 rounded-lg"><a href="index.php"></a>
        </div>
    </form>
  </div>
  <div class="bg-blue-500 mx-auto border-8 border-blue-300 md:w-4/5 xl:w-3/5 mt-8 rounded-2xl">
    <div class="mx-auto w-full">
      <a href="index.php"><button class="w-full hover:bg-blue-400 text-white font-bold py-2 px-4 rounded-lg">Back</button>
    </div> </a>
  </div>

    <footer id="footer">
        <div class="bottom-2 w-full fixed">
            <h6 class="text-center text-sm text-gray-300">Copyright © 2023 Naufal Nasrullah ∙ All Rights Reserved</h6>
        </div>
    </footer>

    <script>
        window.addEventListener("resize", function () {
            if (window.matchMedia("(min-height: 500px)").matches) {
                document.getElementById("footer").style.display = "block";
            } else {
                document.getElementById("footer").style.display = "none";
            }
        })
    </script>
 
</body>

</html>

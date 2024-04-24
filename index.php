<?php

    include "todo-schema.php";
    include "db-connect.php";
    include "model.php";

    $dbResult = getAllTodos($conn);
    $todos = array();

    while( $row = mysqli_fetch_assoc($dbResult) ) {
            $todo = new Todo($row["id"], $row["title"], $row["completed"]);
            array_push($todos, $todo);
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Php</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Todo App</h1>
    </header>

    <main>
        <h2>Add new todo</h2>

        <div>
            <!-- POST request -->
            <form action="add-todo.php" method="POST">
                <input type="text" placeholder="title of your todo" name="title">
                <button type="submit">Add</button>
            </form>
        </div>
        
        <h2>All todos</h2>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Completed</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $todos as $todo ) { 
                        $check = "";
                        if($todo->completed) {
                            $check = "checked";
                        }
                        echo '<tr>
                                <td><input type="checkbox" id=' . $todo->id . ' class="checkbox" value="0" ' . $check .'></td>
                                <td>' . $todo->id . '</td>
                                <td>' . $todo->title . '</td>
                                <td><button class="edit-todo" id=' . $todo->id . '>Edit</button></td>
                                <td><a href="/todo-php/delete-todo.php?id=' . $todo->id . '">Delete</a></td>
                            </tr>';
                    }; ?>
                </tbody>
            </table>

        </div>
    </main>

    <script>
        const editTodos = document.querySelectorAll(".edit-todo");
        const checkboxes = document.querySelectorAll(".checkbox");

        console.log(checkboxes);

        editTodos.forEach(editTodo => {
            editTodo.addEventListener("click", () => {
                console.log("click", editTodo.id);
                let newTodoTitle = window.prompt("Enter new title");

                window.location.replace(`/todo-php/edit-todo.php?id=${editTodo.id}&title=${newTodoTitle}`);
            })

        })


        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function() {

                let newCompleted = 0;

                if(this.checked) {
                    console.log("checked");
                    newCompleted = 1;
                }

                console.log(newCompleted);
                window.location.replace(`/todo-php/edit-completed.php?id=${checkbox.id}&completed=${newCompleted}`);
            }
            )
        })
    </script>
</body>
</html>
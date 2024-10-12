<?php

require_once("comment.php");

$c = new comments();
$c = $c->getAll();
 






if (!empty($comments)) {
    echo "<table border='1'>";
    echo "<tr>
            <th>ID Comment</th>
            <th>Commentaire</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Title</th>
          </tr>";
    foreach ($comments as $comment) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($comment['id_comment']) . "</td>";
        echo "<td>" . htmlspecialchars($comment['commentaire']) . "</td>";
        echo "<td>" . htmlspecialchars($comment['name']) . "</td>";
        echo "<td>" . htmlspecialchars($comment['email']) . "</td>";
        echo "<td>" . htmlspecialchars($comment['date']) . "</td>";
        echo "<td>" . htmlspecialchars($comment['title']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No comments found.";
}
?>
<div class="overflow-x-auto">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr>
        <th>id</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Formation</th>
        <th>Status</th>
        <th>Voir</th>
        <th>Modifier</th>
      </tr>
    </thead>
    <tbody>
      <!--row 1 -->
      <?php
      foreach ($students as $student) : ?>
        <tr>
          <th><?= $student['id'] ?></th>
          <td><?= $student['fName'] ?></td>
          <td><?= $student['lName'] ?></td>
          <td><?= $student['formation'] ?></td>
          <td><?= $student['status'] == 0 ? "Liste d'attente" : "Inscrit" ?></td>
          <td>
            <a href="show-student.php?id=<?= $student['id'] ?>&name=<?= $student['fName'] ?>">
              <i class="fa-solid fa-eye text-green-500"></i>
            </a>
          </td>
          <td><i class="fa-solid fa-pencil text-indigo-500"></i></td>
        </tr>
      <?php endforeach ?>

    </tbody>
  </table>
</div>
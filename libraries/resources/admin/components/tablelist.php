<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">User Type</th>
      <th scope="col">Active</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  require_once "../app/database/config.php";
  $selectQuery = "select * from tbusers order by id desc";
  if($result = $pdo->query($selectQuery)) { 
      if($result->rowCount() > 0) { 
          while($row = $result->fetch()) {

  ?> 
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['firstname']; ?></td>
      <td><?php echo $row['lastname']; ?></td>
      <td>
      
      <?php
      if($row['istype'] == 1) { 
          
      ?>
      <span class="badge bg-success">Administrator</span>
      <?php 
      }
      else { 
         
      ?>
      <span class="badge bg-info">Normal user</span>
      <?php 
      
    }
      ?>
      </td>
      <td>
      <?php 
      if($row['isactive'] == 1) { 

      ?>
<span class="badge bg-success">Active</span>
      <?php 
      }
      else { 

      ?>
<span class="badge bg-danger">Inactive</span>
      <?php 
      }
      
      ?>
      </td>
      <td>
      <?php 
      if($row['istype'] == 1) { //admin

      ?>
 <button class="btn btn-primary" onclick="onmodify(<?php echo $row['id']; ?>)">Modify</button>&nbsp;

      <?php 
      }else if($row['isactive'] == 1) { 

      ?>
 <button class="btn btn-primary" onclick="onmodify(<?php echo $row['id']; ?>)">Modify</button>&nbsp;
      <button class="btn btn-danger" onclick="onremove(<?php echo $row['id']; ?>)">Remove</button>&nbsp;
      <button class="btn btn-danger" onclick="ondeactivate(<?php echo $row['id']; ?>)">Deactivate</button>&nbsp;
      <?php 
      } else if($row['isactive'] == 0) { 

      
      
      ?>
      <button class="btn btn-primary" onclick="onmodify(<?php echo $row['id']; ?>)">Modify</button>&nbsp;
      <button class="btn btn-danger" onclick="onremove(<?php echo $row['id']; ?>)">Remove</button>&nbsp;
      <button class="btn btn-success" onclick="onactivate(<?php echo $row['id']; ?>)">Activate</button>&nbsp;
      <?php 
      }
      ?>
      </td>
    </tr>
  </tbody>
  <?php 
  }
  unset($result);
}
}
unset($pdo);
  ?>
</table>
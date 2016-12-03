    <?php
    $id=isset($_GET['bid'])? $_GET['bid']:NULL;
    $sql="SELECT * FROM tbl_book where id='$id'";
     $q = $conn->prepare($sql);
     $q->execute();
     $result = $q->fetch()
    ?>
    <div class="span8" style="margin-bottom:10px;">

      <img style="float:left;" align="left" src="uploads/<?php echo $result['picture']; ?>" class="img-polaroid">
      <div style="padding-left: 10px; float:left; width: 450px;">
      <b>Name:</b> <?php echo $result['name']; ?> <br>
      <b>price:</b> <?php echo $result['orginalprice']; ?>Tk<br>
      <b>Now Only:</b> <?php echo $result['descountprice']; ?>Tk<br>
      <b>Description:</b> <?php echo $result['description']; ?><br>
      <b>Link:</b><a href="<?php echo $result['writer']; ?>" target="blank" > <?php echo $result['writer']; ?></a>
      <br><br><br>
      
    </div>
    <form action="place-order.php" method="post" >
    <table class="table" style="float:left;">
        <tr>
          <td>Name :</td>
          <td><div class="control-group">
                    <div class="controls">
                    <input type="hidden" value="<?php echo $result['id']; ?>" name="bookid" >
                      <input type="text" id="username" name="username" required  />
                      <p class="help-block"></p>
                    </div>
                  </div></td>
        </tr>
        <tr>
          <td>Email :</td>
          <td><div class="control-group">
                    <div class="controls">
                      <input type="email"  id="email" name="email" required  />
                      <p class="help-block"></p>
                    </div>
                  </div></td>
        </tr>
        <tr>
          <td>Phone :</td>
          <td><div class="control-group">
                    <div class="controls">
                      <input type="number" data-validation-number-message="please enter number only." id="phone" name="phone" required  />
                      <p class="help-block"></p>
                    </div>
                  </div></td>
        </tr>
        <tr>
          <td>Address :</td>
          <td><textarea  rows="3" name="address"></textarea></td>
        </tr>
                <tr>
          <td></td>
          <td><input class="btn btn-success" type="submit" name="confirm-order" value="Confirm Order" ></td>
        </tr>
      </table>

      </form>
    </div>
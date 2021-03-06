    
    <section id="profile_pag">
    <article>
        <header id="dados">

        <img class="circle" src="images/w2.PNG" alt="" width="130">
        <h4><?php echo  $result["name"] ?></h4> 
        <h5><?php echo  $result2["Sname"] ?></h5>
        </header>

        
        <aside class="aside_profile">
          <input type="checkbox" id="hamburger">
          <label class="hamburger" id="prof" for="hamburger">
            <ul id="link_profile">
            <li><a href="#profile">My Profile</a></li>
            <li><a href="#department">Department</a></li>
            <li><a href="#inpatients">Inpatient Profile</a></li>
            <li><a href="index.php">Home</a></li>
            </ul>
          </label> 
        </aside>

        </article>

        <div class="info">
        <h2 id="profile">Profile</h2>
        <span><?php echo $msg ?></span>

            <article class="info_section">
                <h4 >Personal identification: </h4>
                <h5 class="atribute">Name:</h5> <p><?php echo  $result["name"] ?></p>
                <h5 class="atribute">Department:</h5>  <p><?php echo  $result2["Sname"] ?></p>
            </article> 

            <article class="info_section">
                <h4 class="info_section">Contacts: </h4>
                <h5 class="atribute">Mail Address: </h5> <p><?php echo  $result["mail_address"] ?></p>
                <?php if (strlen($result["phone_number"])>0){?>
                <h5 class="atribute">Phone Number: </h5><p><?php echo  $result["phone_number"]; }?></p>
            </article> 

          <h2 id="department">Department</h2>
          <article class="info_section">
                <h4>Beds: </h4>
               
                  <h5 class="atribute"> Total capacity:</h5> <p> <?php echo  $result_Tbeds["Total_beds"] ; ?> beds</p>
                  <h5 class="atribute">Beds Occupy:</h5><p> <?php echo  $result_Occupybeds["occupy"] ;?> </p>
             
            </article> 


            <article class="info_section" id="inpatients">
                <h4 class="info_section">Inpatients: </h4>
                
                <?php foreach ($result3 as $row) { ?>
                  <h5 class="atribute"> 
                    <p>Name: <?php echo  $row["patient"] ?></p>
                    <h6 class= "subatribute">
                      <p>Code: <?php echo  $row["code"] ?> </p>
                      <p>Bed: <?php echo  $row["bed"] ?></p>
                      <p>You can consult more info about the inpatient <a href='inpatient.php?code=<?php echo $row["code"] ?>'>here.</a> </p>
                    </h6>
                  </h5>
                <?php  }?>
            </article> 

    </div>

    </section> 
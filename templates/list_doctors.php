<section id="department">
    <article>
        <header>
            <h2 class="pagtitle"><?php echo $Department_name ?></h2>
        </header>

        <h3>Are you looking for a specific doctor? </h3>
        <form action="departament&doctors.php" id="search">
            <input type="hidden" name="dep" value="<?php echo $dep_number; ?> ">
            <input type="hidden" name="name" value="<?php echo $Department_name; ?> ">
            <input type="text" name="Dname" placeholder="name of Doctor">
            <input type="text" name="email" placeholder="Email Address">
            <input id="button_search" type="submit" value="SEARCH">
        </form>

        <section class="Doctors_list">
            <p>Welcome to the <?php echo $Department_name; ?>  service. These are our specialized doctors.</p>
            <p>Here you can consult all the information you need: Doctor's name, contact, mail address.</p>
            <p>if you want to schedule an appointment, here you can see the schedule at which each doctor is making appointments.</p>
            


            <?php if ($err == null) { ?>
                <?php foreach ($result as $row) { ?>

                    <ul>
                        <a href="Doctor_without_login.php?id=<?php echo $row["id"] ?>">
                            <il class="especialista">

                                <h4 id="Dname"> <?php echo $row["name"] ?><br></h4>

                                <?php if ($row["photo"] == NULL) { ?>
                                    <img class="circle" src="images/w3.PNG" alt="16" style="width: 150px;">
                                <?php } else { ?>
                                    <img class="circle" src="<?php echo $row["photo"] ?>" alt="" style="width: 150px;">
                                <?php } ?>

                                <h4 id="info"> <br><br><?php echo $row["phone_number"] ?><br> <?php echo $row["mail_address"] ?></h4>

                            </il>
                        </a>

                    </ul>

                <?php } ?>
            <?php } else { ?>
                <p><?php echo "There was an error retrieving the categories"; ?></p>
            <?php } ?>


            <?php if (!isset($Dname)) { // remove pagination for search?>
            
                <div id="pagination">
                    <?php if ($page > 1) { ?>
                        <a href="?dep=<?php echo $dep_number ?>&name=<?php echo $Department_name ?>&page=<?php echo $page - 1 ?>">&lt;</a>
                    <?php } else { ?>
                        <a href="" id="lt">&lt;</a>
                    <?php } ?>
                    <?php echo $page; ?>

                    <?php if ($page < $n_pages) { ?>
                        <a href="?dep=<?php echo $dep_number ?>&name=<?php echo $Department_name ?>&page=<?php echo $page + 1 ?>">&gt;</a>
                    <?php } else { ?>
                        <a href="" id="lt">&lt;</a>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>

    </article>
</section>
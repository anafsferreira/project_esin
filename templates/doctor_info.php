<section id="profile_pag">
          <article>
            <header id="dados">
              <img class="circle" src="<?php echo  $result["photo"] ?>" alt="" width="130">
              <h4><?php echo  $result["name"] ?></h4> 
              <h5><?php echo  $result2["Sname"] ?></h5>

            </header>
          
            
          </article>

          <div class="info">
          <h2>Profile</h2>
          <span><?php echo $msg ?></span>
            

            <article class="info_section">
                <h4 class="info_section">Contacts: </h4>
                <h5 class="atribute">Mail Address:</h5> <p><?php echo  $result["mail_address"] ?></p>
                <?php if (strlen($result["phone_number"])>0){?>
                <h5 class="atribute">Phone Number:</h5> <p><?php echo  $result["phone_number"]; }?></p>
            </article> 

            
            <h2>Schedule</h2>
            <?php if( $numRowsSchedule['num'] != 0) { ?> 
            <table class= "doctor_schedule">
                  <?php $week_days = array('MON', 'TUE', 'WED', 'THU', 'FRI');?>
                  <?php $begin_hours = array('8:00','9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00');?>
                  <tr> 
                    <th class ="b"> Hour</th>
                    <th class ="b"> Monday </th>
                    <th class ="b"> Tuesday </th>
                    <th class ="b"> Wednesday </th>
                    <th class ="b"> Thursday </th>
                    <th class ="b"> Friday </th>
                  
                  </tr>
                  <?php foreach($begin_hours as $begin_hour){ ?> <!-- Para cada linha-->
                    <tr> 
                      
                      <td class ="block_time"> <?php echo $begin_hour?> - <?php echo $begin_hour+1;?>:00 </td>

                      <?php foreach($week_days as $day){ ?> <!-- Para cada coluna -->
                        
                        <?php if(canMakeAppointment($schedule, $begin_hour, $day) == 1){ ?>
                          <td class ="mark_appointment">
                            <?php echo "Doing Appointments" ;?>
                          </td>
                        <?php } else { ?>
                          <td class ="mark_appointment"></td>
                        <?php } ?>

                      <?php }?>
                      
                    </tr>

                  <?php }?>
                  

            </table>
            <?php } else { ?> <!-- Show message -->
              <p>The Doctor does not have a schedule for Appointments.</p>
            <?php } ?>
          </div>

        </section> 
<?php
    require_once '../Model/log.class.php';
    $log = new LogActions();
    $log->checkIfSession();
    require_once 'header.php';
    require_once 'nav.php';
    ?>
<div class="container col-9 bg-light min-vh-100 py-4">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                  <form name="search" action="../Controller/messagerie/messagerie.php" method="post"></form>
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <!-- <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5 class="friend_name">Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p class="last_message">Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
            <!-- ici se trouvera la div du chat actif -->
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
                <form  class="message_form" action="" method="post">
                  <input type="text" class="write_msg" name="message" placeholder="Type a message" />
                  <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</body>
<script src="../script/messagerie/messagerie.js"></script>
<script src="../script/messagerie/activeChatEl.js"></script>
</html>
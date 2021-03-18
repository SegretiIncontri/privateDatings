<div class="to_sidebar_mini">
	<ul class="valign-wrapper">
		<li class="<?php if($data['name'] == 'find-matches'){ echo 'active';}?>">
			<a href="<?php echo $site_url;?>/find-matches">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 20a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9zm-8-3l3.359-3.359a2.25 2.25 0 1 0-3.182-3.182l-.177.177-.177-.177a2.25 2.25 0 1 0-3.182 3.182L12 17z" class="active_path" fill="currentColor"/></svg>
			</a>
		</li>
        <li class="header_msg">
            <a href="javascript:void(0);" id="messenger_opener">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8zm2 14h2a6 6 0 1 0 0-12h-4a6 6 0 0 0-6 6c0 3.61 2.462 5.966 8 8.48V17z"
                          fill="currentColor"/>
                </svg>
                <?php
                $unread_messages = 0;// Message::getUnreadMessages();
                if ($unread_messages > 0) {
                    echo '<span class="badge chat_badge" href="javascript:void(0);" id="messenger_opener">' . $unread_messages . '</span>';
                } else {
                    echo '<span class="badge chat_badge hide" href="javascript:void(0);" id="messenger_opener">0</span>';
                }
                ?>
                <?php echo __('messenger'); ?>
            </a>
        </li>

        <li class="header_notifications">
            <a href="javascript:void(0);" id="notificationbtn"
               data-ajax-post="/useractions/shownotifications" data-ajax-params=""
               data-ajax-callback="callback_show_notifications" data-target="notif_dropdown"
               class="to_noti_menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zm-2 0v-7a6 6 0 1 0-12 0v7h12zm-9 4h6v2H9v-2z"
                          fill="currentColor"/>
                    <path d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zM9 21h6v2H9v-2z" class="active_path"
                          fill="currentColor"></path>
                </svg>
                <span class="badge notification_badge hide">0</span> <?php echo __('notifications_single'); ?>
            </a>
            <ul id="notif_dropdown" class="dropdown-content">
                <div class="dt_notifis_prnt">
                    <div class="empty_state">
                        <svg class="to_spin" viewBox="0 0 52 52">
                            <circle class="to_spin_path" cx="26px" cy="26px" r="20px" fill="none"
                                    stroke-width="3px"></circle>
                        </svg>
                    </div>
                </div>
            </ul>
        </li>
        <li class="<?php if($data['name'] == 'pro'){ echo 'active';}?>">
            <a href="<?php echo $site_url;?>/pro" data-ajax="/pro">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M2 19h20v2H2v-2zM2 5l5 3.5L12 2l5 6.5L22 5v12H2V5zm2 3.841V15h16V8.841l-3.42 2.394L12 5.28l-4.58 5.955L4 8.84z"
                          fill="currentColor"/>
                </svg>			</a>
        </li>
		<li>
			<a onclick="javascript:$('body').toggleClass('side_open');"><img src="<?php echo $profile->avater->avater;?>" class="circle" alt="<?php echo $profile->full_name;?>" /></a>
		</li>
	</ul>
</div>
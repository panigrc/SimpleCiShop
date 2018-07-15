				<div class="right_side">
					<div class="article">
                        <div style="text-align:center; font-weight: bold; background-color:#FFFABF"><?php if($status==='ok') echo $this->lang->line('main_message_sent'); if($status==='nok') echo $this->lang->line('main_message_not_sent');?></div>
                        <h2><?php echo $this->lang->line($pagename);?></h2>
<?php echo form_open('contact/submit/'.$lang); ?>
					    <p class="search">
                            <label class="search" for="full_name"><?php echo $this->lang->line('main_full_name'); ?>:</label> 
                            <input type="text" name="full_name" id="full_name" class="contact" value="" />
                        </p>
                        <p class="search">
                            <label class="search" for="email"><?php echo $this->lang->line('main_email'); ?>:</label> 
                            <input type="text" name="email" id="full_name" class="contact" value="" />
                        </p>
                        <p class="search">
                            <label class="search" for="phone"><?php echo $this->lang->line('main_phone'); ?>:</label> 
                            <input type="text" name="phone" id="phone" class="contact" value="" />
                        </p>
                        <p class="search">
                            <label class="search" for="company"><?php echo $this->lang->line('main_company'); ?>:</label> 
                            <input type="text" name="company" id="company" class="contact" value="" />
                        </p>
                        <p class="search">
                            <label class="search" for="website"><?php echo $this->lang->line('main_website'); ?>:</label> 
                            <input type="text" name="website" id="website" class="contact" value="http://" />
                        </p>
                        <p class="search">
                            <label class="search" for="message"><?php echo $this->lang->line('main_message'); ?>:</label> 
                            <textarea name="message" id="message" class="contact"></textarea>
                        </p>
                        <p class="search">
                            <label class="search" for="notspam"><?php echo $this->lang->line('main_spam_protection'); ?>:</label> 
                            <select name="notspam" id="notspam" class="contact">
                                <option value="1"><?php echo $this->lang->line('main_spam'); ?></option>
                                <option value="2"><?php echo $this->lang->line('main_not_spam'); ?></option>
                            </select>
                        </p>
                        <p>
                            <input type="submit" value="<?php echo $this->lang->line('main_submit'); ?>" class="submit" />
                        </p>
<?php echo form_close(); ?>
				        <div style="clear: both"></div>
                    </div>
				</div>

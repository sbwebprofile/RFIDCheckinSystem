<?php echo validation_errors('<div class="login-warning"><span class="center">', '</span></div>'); ?>
<?php 
	if ($message) {
		echo '<div class="logg-success"><span class="center">';
		echo $message;
		echo '</span></div>';
	}
?>

<div class="login-warning" style="border-color:#000; background:#f0f0f0;">
	<?php echo anchor('edge_user/feedback', 'Let us know what you think about this system! Send us your Feedback', array('class'=>'center', 'style'=>'text-decoration:none; display:block; text-align:center;', 'title'=>'Send Us Your Feedback')); ?>
</div>
<div id="content">
	<?php echo form_open($form_action, array('id'=>'profile-form', 'class' => 'logg-form content-inner center')) ?>
		<input type="hidden" name="id" value="<?php echo $user_details['ID']; ?>" />
		<?php echo anchor('edge_user/change_password','Change Password', array('class'=>'logg-button','title'=>'Change Your Password')); ?>
		<?php echo anchor('project','View Projects', array('class'=>'logg-button','title'=>'View List Of Projects')); ?>
		<?php echo anchor('edge_user/logout', 'Logout', array('class'=>'logg-button right','title'=>'Logout')); ?>
		
		<br /><br /><br />

		<h1>Profile Info</h1>


		<div class="collapse-head collapse-nohide collapse-floating" id="collapse-profile">
			<h3 class="inline-block">Profile Info</h3>
			<div class="collapsed-arrow right" id="collapse-profile-arrow-collapsed">&#9660;</div>
			<div class="expanded-arrow right" id="collapse-profile-arrow-expanded">&#9650;</div>
		</div>
		<div class="collapse-content" id="collapse-profile-content">
			<!--<h3>Swipe Card ID:</h3>
			<input type="text" class="logg-textbox" name="swipe" readonly="readonly"
				value="<?php if (empty($user_details['ThirdPartyID'])) echo "To Be Allocated";
				else echo $user_details['ThirdPartyID']; ?>" />-->

			<h3>Username:</h3>
			<input type="text" class="logg-textbox logg-readonly" name="username" readonly="readonly"
				value="<?php echo $user_details['username']; ?>" />

			<h3>First name:</h3>
			<input type="text" class="logg-textbox" name="firstname"
				value="<?php echo $user_details['firstname'];?>" />

			<h3>Last name:</h3>
			<input type="text" class="logg-textbox" name="lastname"
				value="<?php echo $user_details['lastname'];?>" />

			<h3>Email:</h3>
			<input type="text" class="logg-textbox" name="email"
				value="<?php echo $user_details['email'];?>" />

			<!--<h3>Occupation:</h3>-->
			<input type="hidden" name="occupation"
				value="<?php echo $user_details['occupation'];?>" />

			<div class="right">
				<input class="logg-button" type="submit" value="Add/Update" />
			</div>
		</div>
		<br /><br />
		<br /><br />
		<br />


		<h1>What are you up to at The Edge?</h1>


		<div class="collapse-head no-collapse" id="collapse-donotdisturb" click-on-click="dontdisturb" >
			<input id="dontdisturb" type="checkbox" class="logg-checkbox" name="dontdisturb"
			<?php echo ($user_details['dontdisturb'] == 1) ? 'checked="true"' : null; ?>
				value="<?php echo ($user_details['dontdisturb'] == 1) ? "do_not" : "do"; ?>" />
			<h3 class="inline">I'm busy, don't disturb me</h3>
		</div>
		<br /><br />


		<div class="collapse-head" id="collapse-cometalk">
			<div class="collapsed-arrow right" id="collapse-cometalk-arrow-collapsed">&#9660;</div>
			<div class="expanded-arrow right" id="collapse-cometalk-arrow-expanded">&#9650;</div>
			<input type="radio" class="logg-checkbox" name="status" checked />
			<h3 class="inline">Just hanging out today, come talk to me!</h3>
		</div>
		<div class="collapse-content" id="collapse-cometalk-content">
			<h3>My background / interests / hobbies</h3>
			<?php
				if (isset($interests)) {
					print '<table class="interest-list"';

					foreach($interests as $interest) {
						print '<tr class="interest-space"></tr>';

						print '<tr>';
						print '<td class="interest-name logg-textbox logg-readonly">' . $interest['interest'] . '</td>';
						print '<td><select style="display:none" title="Interest level" name="interest_level_' . $interest['ID'] . '">';
						for($i=1;$i<6;$i++) {
								print '<option value="' . $i . '" ';
								if ($i==$interest['level']) print "selected ";
								print '>' . $i . '</option>';
						}
						print '</select></td>';
						print '<td><input type="checkbox" title="Keep interest" name="interest_' . $interest['ID'] . '" value="' . $interest['ID'] . '" checked /></td>';
						print '</tr>'; // interest-item
					}
					print '</table>'; // interest-list
				}

			?>

			<table style="width: 100%">
				<tr class="interest-space"></tr>
				<tr>
					<td style="width: 100%">
						<input type="text" class="interest-name logg-textbox" name="new_interest" value="" />
					</td>
					<td>
						<select name="new_interest_level" style="display:none" title="Level of interest">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</td>
					<td><input type="checkbox" style="visibility:hidden"/></td>
				</tr>
			</table>

			<div class="right">
				<input class="logg-button" type="submit" value="Add/Update" />
			</div>
		</div>

		<br /><br />

		<div class="collapse-head" id="collapse-goodwith">
			<div class="collapsed-arrow right" id="collapse-goodwith-arrow-collapsed">&#9660;</div>
			<div class="expanded-arrow right" id="collapse-goodwith-arrow-expanded">&#9650;</div>
			<input type="radio" class="logg-checkbox" name="status" />
			<h3 class="inline">I am happy to share my skills!</span>
		</div>
		<div class="collapse-content" id="collapse-goodwith-content">
			<h3>Skills I can share with other Edge users</h3>
			<?php
				if (isset($expertises)) {
					print '<table class="interest-list"';

					foreach($expertises as $expertise) {
						print '<tr class="interest-space"></tr>';

						print '<tr>';
						print '<td class="interest-name logg-textbox  logg-readonly">' . $expertise['expertise'] . '</td>';
						print '<td><select title="Expertise level" name="expertise_level_' . $expertise['ID'] . '">';
						for($i=1;$i<6;$i++) {
								print '<option value="' . $i . '" ';
								if ($i==$expertise['level']) print "selected ";
								print '>' . $i . '</option>';
						}
						print '</select></td>';
						print '<td><input type="checkbox" title="Keep expertise" name="expertise_' . $expertise['ID'] . '" value="' . $expertise['ID'] . '" checked /></td>';
						print '</tr>'; // interest-item
					}
					print '</table>'; // interest-list
				}

			?>

			<table style="width: 100%">
				<tr class="interest-space"></tr>
				<tr>
					<td style="width: 100%">
						<input type="text" class="interest-name logg-textbox" name="new_expertise" value="" />
					</td>
					<td>
						<select name="new_expertise_level" title="Level of expertise">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</td>
					<td><input type="checkbox" style="visibility:hidden"/></td>
				</tr>
			</table>

			<div class="right">
				<input class="logg-button" type="submit" value="Add/Update" />
			</div>
		</div>

			<br /><br />



		<div class="collapse-head" id="collapse-question">
			<div class="collapsed-arrow right" id="collapse-question-arrow-collapsed">&#9660;</div>
			<div class="expanded-arrow right" id="collapse-question-arrow-expanded">&#9650;</div>
			<input type="radio" class="logg-checkbox" name="status" />
			<h3 class="inline-block">I need your help &#46;&#46;&#46;</h3>
		</div>
		<div class="collapse-content" id="collapse-question-content">
			<h3>I need someone's help with &#46;&#46;&#46;</h3>
			<span class="subtitle">(My project ideas / questions)</span>

			<?php
				if (isset($questions)) {
					print '<table class="interest-list"';

					foreach($questions as $question) {
						print '<tr class="interest-space"></tr>';

						print '<tr>';
						print '<td class="interest-name logg-textbox  logg-readonly">' . $question['question'] . '</td>';
						print '<td><input type="checkbox" title="Keep question" name="question_' . $question['ID'] . '" value="' . $question['ID'] . '" checked /></td>';
						print '</tr>'; // interest-item
					}
					print '</table>'; // interest-list
				}

			?>

			<table style="width: 100%">
				<tr class="interest-space"></tr>
				<tr>
					<td style="width: 100%">
						<input type="text" class="interest-name logg-textbox" name="new_question" value="" />
					</td>
					<td><input type="checkbox" style="visibility:hidden"/></td>
				</tr>
			</table>

			<div class="right">
				<input class="logg-button" type="submit" value="Add/Update" />
			</div>
		</div>
			<br /><br />


		<div class="collapse-head no-collapse" id="collapse-donotdisturb">
			<input type="radio" class="logg-checkbox" name="status" />
			<h3 class="inline">I'm new here, and don't really know what The Edge is about yet &#46;&#46;&#46;</h3>
		</div>
		<br /><br />


		<div class="collapse-head no-collapse" id="collapse-donotdisturb">
			<input type="radio" class="logg-checkbox" name="status" />
			<h3 class="inline">Other status message:</h3>
			<input type="text" style="margin-bottom: 0; margin-top: 3pt;" class="interest-name logg-textbox" name="status_message" value="" />

		</div>
		<br /><br />
		<br /><br />


		<h1>Social Media Settings</h1>
		<div class="collapse-head collapse-nohide collapse-floating" id="collapse-socialmedia">
			<h3 class="inline-block">Social Media Settings</h3>
			<div class="collapsed-arrow right" id="collapse-socialmedia-arrow-collapsed">&#9660;</div>
			<div class="expanded-arrow right" id="collapse-socialmedia-arrow-expanded">&#9650;</div>
		</div>
		<div class="collapse-content" id="collapse-socialmedia-content">

			<h3>Share my checkins via &#46;&#46;&#46;</h3>
			<table style="width: 100%; margin-top: 0.6em;">
				<tr style="height: 1.5em;">
					<td>
						<input type="checkbox" class="logg-checkbox" name="socialmedia_twitter">
						My Twitter
					</td>
					<td>
						<input type="checkbox" class="logg-checkbox" name="socialmedia_edgetwitter">
						The Edge Twitter account
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" class="logg-checkbox" name="socialmedia_facebook">
						My Facebook
					</td>
					<td>
						<input type="checkbox" class="logg-checkbox" name="socialmedia_edgefacebook">
						The Edge Facebook account
					</td>
				</tr>
			</table>

			<br /><br />

			<h3>Inform me about others' checkins</h3>
			<table style="width: 100%; margin-top: 0.6em;">
				<tr style="height: 3em;">
					<td>
						Email
					</td>
					<td>
						<div>
							<input type="checkbox" class="logg-checkbox" name="socialmedia_edgetwitter">
							Digestive Email (once per day)
						</div>
						<div>
							<input type="checkbox" class="logg-checkbox" name="socialmedia_edgetwitter">
							Email for every checkin
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Twitter
					</td>
					<td>
						Checkins and statistics are published<br />automatically, just follow <strong>@EdgeSLQ</strong>
					</td>
				</tr>
			</table>

		</div>
		<br /><br />
		<br /><br />


			<?php 
				echo anchor('project','View Projects', array('class'=>'logg-button','title'=>'View List Of Projects'));
			?> 
			<div class="right">
				<input type="submit" class="logg-button logg-submit" value="Update" />
			</div>
			<div class="clearfix"></div>
</div>
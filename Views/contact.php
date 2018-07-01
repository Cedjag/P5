<div id="frmContact">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top:20px;">Nom</label><span id="userName-info" class="info"></span><br/>
        <input type="text" name="userName" id="userName" class="demoInputBox">
    </div>
    <div>
        <label>Email</label><span id="userEmail-info" class="info"></span><br/>
        <input type="text" name="userEmail" id="userEmail" class="demoInputBox">
    </div>
    <div>
        <label>Objet</label><span id="subject-info" class="info"></span><br/>
        <input type="text" name="subject" id="subject" class="demoInputBox">
    </div>
    <div>
        <label>Contenu</label><span id="content-info" class="info"></span><br/>
        <textarea name="content" id="content" class="demoInputBox" cols="60" rows="6"></textarea>
    </div>
    <div>
        <button name="submit" class="btnAction" onClick="sendContact();">Send</button>
    </div>
</div>
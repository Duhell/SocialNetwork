document.getElementById('user_avatar').addEventListener('change', function(e) {
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('profilePicture').src = e.target.result;
    }
    reader.readAsDataURL(this.files[0]);
});

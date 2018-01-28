<script>
    document.getElementById("logout").onclick = function () {
        location.href = "../login-system/logout.php";
    };
    window.onload = function() {
        document.getElementById('neg-marking').style.display = 'none';
        document.getElementById('test-time').style.display = 'none';
    };
    $('#neg-enable').click(function() {
        $('#neg-marking')[this.checked ? "show" : "hide"]();
    });
    $('#test-time-enable').click(function() {
        $('#test-time')[this.checked ? "show" : "hide"]();
    });
</script>

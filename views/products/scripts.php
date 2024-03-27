<script>
    function sendSelectedValue() {
        var selectedValue = document.getElementById("sort").value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Nếu yêu cầu hoàn thành, tải lại trang
                window.location.reload();
            }
        };
        xhttp.open("GET", "?act=products&<?=(isset($_GET['page'])&&$_GET['page']!="")?'page='.$_GET['page'].'&':'';?>sort=" + selectedValue, true);
        xhttp.send();
        var newUrl = window.location.pathname + "?act=products&<?=(isset($_GET['page'])&&$_GET['page']!="")?'page='.$_GET['page'].'&':'';?>sort=" + selectedValue;
        history.pushState({
            path: newUrl
        }, '', newUrl);
    }
</script>
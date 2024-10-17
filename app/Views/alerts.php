<!-- alerts.php -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   function showSuccessMessage(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: "success",
        });
    }

    function showErrorMessage(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: "error",
        });
    }
</script>

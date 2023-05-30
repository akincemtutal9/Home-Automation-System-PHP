function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "../php/delete_users.php?userID=" + id;
    }
}
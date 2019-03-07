{{-- Confirm Delete Modal --}}

<script type="text/javascript">

  $('#confirmDelete').on('show.bs.modal', function (e) {
    var message = 'Estas seguro que quieres borrar este usuario?';
    var title = 'Borrar Usuario';
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-body p').text(message);
    $(this).find('.modal-title').text(title);
    $(this).find('.modal-footer #confirm').data('form', form);
  });
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });

</script>
<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
      <tr>
        <td>
          {{$ticket->ticket_id}}
        </td>
        <td>
          {{$ticket->user_id}}
        </td>
      </tr>
      <tr>
        <td>
          {{$ticket->company_name}}
        </td>
        <td>
          {{$ticket->destination_terminal}}
        </td>
      </tr>
    </table>
  </body>
</html>
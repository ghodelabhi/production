<!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enquiry Details</h4>
        </div>
        <div class="modal-body">
          <table border='0' class="table table-striped">
            <tr>
              <th>User Name</th><td><?php echo $enquiry->user_name ?></td>
            </tr>
            <tr>
              <th>Email</th><td><?php echo $enquiry->email ?></td>
            </tr>
            <tr>
              <th>Phone</th><td><?php echo $enquiry->phone ?></td>
            </tr>
            <tr>
              <th>Message</th><td><?php echo $enquiry->message ?></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
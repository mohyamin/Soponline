<div class="card-body">
  <table class="table table-bordered table-hover" id="vakses">
    <thead>
      <tr class="bg-primary">
        <th>No</th>
        <th>Menu</th>
        <th>Izin Akses</th>

      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($data_menu as $row) {

      ?>
        <tr>
          <td class="bg-success"><?= $i++; ?></td>
          <td class="bg-success"><?= $row->nama_menu ?></td>
          <td>
            <?php if ($row->view_level == "Y") { ?>
              <div id="vcek<?= $i . $row->id ?>" onClick="checked('<?= $row->id ?>','<?= $row->id_level ?>')">
                <i class="fas fa-check-circle text-success btn"></i>
              </div>

            <?php } else { ?>
              <div id="vucek<?= $i . $row->id ?>" onClick="unchecked('<?= $row->id ?>','<?= $row->id_level ?>')">
                <i class="fa fa-times-circle text-red btn"></i>
              </div>

            <?php } ?>
          </td>


        </tr>
        <?php

        foreach ($data_submenu as $sub) {
          if ($sub->id_menu == $row->id_menu) {
        ?>
            <tr>
              <td></td>
              <td><?= $sub->nama_submenu ?></td>
              <td>
                <?php if ($sub->view_level == "Y") { ?>
                  <div onClick="vchecked('<?= $sub->id ?>','<?= $sub->id_level ?>')">
                    <i class="fas fa-check-circle text-success btn"></i>
                  </div>
                <?php } else { ?>
                  <div onClick="vunchecked('<?= $sub->id ?>','<?= $sub->id_level ?>')">
                    <i class="fa fa-times-circle text-red btn"></i>
                  </div>
                <?php } ?>
              </td>

            </tr>
        <?php
          }
        } ?>
      <?php
      } ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  function checked(id, level) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('userlevel/update_akses') ?>',
      data: 'chek=checked&id=' + id,
      success: function(data) {
        $.ajax({
          url: '<?php echo base_url('userlevel/view_akses_menu'); ?>',
          type: 'post',
          data: 'id=' + level,
          success: function(respon) {
            $("#md_def").html(respon);
          }
        })
      }
    });
  }

  function unchecked(id, level) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('userlevel/update_akses') ?>',
      data: 'chek=unchecked&id=' + id,
      success: function(data) {

        $.ajax({
          url: '<?php echo base_url('userlevel/view_akses_menu'); ?>',
          type: 'post',
          data: 'id=' + level,
          success: function(respon) {
            $("#md_def").html(respon);
          }
        })
      }
    });
  }

  function vchecked(id, level) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('userlevel/view_akses') ?>',
      data: 'chek=checked&id=' + id,
      success: function(data) {
        $.ajax({
          url: '<?php echo base_url('userlevel/view_akses_menu'); ?>',
          type: 'post',
          data: 'id=' + level,
          success: function(respon) {
            $("#md_def").html(respon);
          }
        })
      }
    });
  }

  function vunchecked(id, level) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('userlevel/view_akses') ?>',
      data: 'chek=unchecked&id=' + id,
      success: function(data) {
        $.ajax({
          url: '<?php echo base_url('userlevel/view_akses_menu'); ?>',
          type: 'post',
          data: 'id=' + level,
          success: function(respon) {
            $("#md_def").html(respon);
          }
        })
      }
    });
  }
</script>
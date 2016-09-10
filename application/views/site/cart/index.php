<style type="text/css">
  .table tbody tr td, .table tfoot tr td {
    vertical-align: middle;
  }

    @media screen and (max-width: 600px) {
    table#cart tbody td .form-control {
      width:20%;
      display: inline !important;
    }

    .actions .btn {
      width:36%;
      margin:1.5em 0;
    }

    .actions .btn-info {
      float:left;
    }

    .actions .btn-danger {
      float:right;
    }

    table#cart thead {
      display: none;
    }

    table#cart tbody td {
      display: block;
      padding: .6rem;
      min-width:320px;
    }

    table#cart tbody tr td:first-child {
      background: #333;
      color: #fff;
    }

    table#cart tbody td:before {
      content: attr(data-th);
      font-weight: bold;
      display: inline-block;
      width: 8rem;
    }

    table#cart tfoot td {
      display:block;
    }
    table#cart tfoot td .btn {
      display:block;
    }
}</style>
<link rel="stylesheet" href="<?php echo base_url('public/admin') ?>/css/bootstrap/bootstrap.css">
<script src="<?php echo base_url('public') ?>/js/bootstrap.js"></script>

<div class="container" style="width: 800px;float: left;">
<?php if($total_items > 0): ?>
<form method="post" action="<?php echo base_url('cart/update'); ?>">
 <table id="cart" class="table table-hover table-condensed" >
    <thead>
      <tr>
        <th style="width:50%" class="text-center">Tên sản phẩm</th>
        <th style="width:10%" class="text-center">Giá</th>
        <th style="width:8%" class="text-center">SL</th>
        <th style="width:22%" class="text-center">Thành tiền</th>
        <th style="width:10%" class="text-center">Thao tác</th>
      </tr>
    </thead>
    <?php $total_amount = 0; ?>
    <?php foreach($carts as $row):  ?>
      <?php $total_amount += $row['subtotal'] ;?>
    <tbody>
      <tr>
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-2 hidden-xs">
              <img src="<?php echo base_url('upload/product/'.$row['image_link']); ?>" alt="" width="100" class="img-responsive">
            </div>
            <div class="col-sm-10">
              <h4 class="nomargin"><?php echo $row['name']?></h4>
            </div>
          </div>
        </td>
        <td data-th="Price"><?php echo $row['price']?></td>
        <td data-th="Quantity">
        <input class="form-control text-center" value="<?php echo $row['qty']?>" name="qty_<?php echo $row['id'] ?>">
      </td>
      <td data-th="Subtotal" class="text-center"><?php echo $row['subtotal']?></td>
      <td class="actions" data-th="">
        <button type="submit" class="btn btn-info btn-sm"> 
          Update
        </button>
        <a class="btn btn-danger btn-sm" style="width:62px" href="<?php echo base_url('cart/del/'.$row['id']); ?>">
          Delete  
        </a>
      </td>
    </tr>
  </tbody>
  <?php endforeach; ?>
  <tfoot>
  <tr>
    <td>
        <a class="btn btn-warning fa fa-angle-left" href="<?php echo base_url('cart/del'); ?>">Xóa hết</a>
    </td>
  <td colspan="2" class="hidden-xs"> </td>
  <td class="hidden-xs text-center"><strong style="color:#F37021;">Tổng tiền <?php echo number_format($total_amount) ?></strong>
  </td>
  <td>
    <a href="<?php echo site_url('order/check_out'); ?>" class="btn btn-success btn-block">Đặt hàng<i class="fa fa-angle-right"></i>
    </a>
  </td>
  </tr>
  </tfoot>
</table>
</form>
<?php else: ?>
  <h4>Không có sản phẩm nào</h4>
<?php endif; ?>
</div>

<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col">Total Price</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($orders as $order)
          <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $order->date }}</td>
              <td>
                  @if ($order->status == 1)
                      Paid
                  @else
                      Unpaid
                  @endif
              </td>
              <td>IDR {{ number_format($order->total_price) }}</td>
          </tr>
      @endforeach
          <tr>
              <td colspan="3">Total Pendapatan</td>
              <td colspan="3">{{ number_format($orders->sum('total_price')) }}</td>
          </tr>
  </tbody>
</table>
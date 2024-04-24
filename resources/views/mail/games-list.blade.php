Good evening valued customers! Here is a list of games that are currently still in stock:

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Stock</th>
    </tr>
  </thead>
  <tbody>
    @foreach($games as $game)
      <tr>
        <td>{{ $game->name }}</td>
        <td>{{ $game->description }}</td>
        <td>{{ $game->price }}</td>
        <td>{{ $game->stock }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
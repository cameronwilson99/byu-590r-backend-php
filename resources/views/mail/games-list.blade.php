Hello manager. Here is a list of games that are currently still in stock:

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Stock</th>
    </tr>
  </thead>
  <tbody>
    @foreach($games as $game)
      <tr>
        <td>{{ $game->name }}</td>
        <td>{{ $game->stock }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="table-responsive">
    <table class="table" id="profitMargins-table">
        <thead>
        <tr>
            <th>Marca</th>
            <th>Combustível</th>
            <th>Categoria</th>
            <th>Vendedores</th>
            <th>Chefe de vendas</th>
            <th>Diretor comercial</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($profitMargins as $profitMargin)
            <tr>
                <td>{{ $profitMargin->make->name }}</td>
                
                <td>{{ $profitMargin->fuel->name }}</td>
                <td>{{ $profitMargin->category->name }}</td>
                <td>{{ $profitMargin->level_1 }}%</td>
                <td>{{ $profitMargin->level_2 }}%</td>
                <td>{{ $profitMargin->level_3 }}%</td>
                <td width="120">
                    {!! Form::open(['route' => ['profitMargins.destroy', $profitMargin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('profitMargins.show', [$profitMargin->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('profitMargins.edit', [$profitMargin->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

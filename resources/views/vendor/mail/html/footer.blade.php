<tr>
<td class="footer" style="width: 100%; height: 100%; background-color: #000;">
<div style="width: 100%; padding: 50px 50px 0px 50px; display: flex; justify-content: space-between;">
    <div style="width: 30%;">
        <h1 style="color: #fff; font-size: 32px;">Finiclasse</h1>
        <h2 style="color: #fff; line-height: 0px;">Representante oficial</h2>
        <h2 style="color: #fff;">Mercedes-Benz, Smart e SEAT</h2>
        <div style="justify-content: none; float: left;">
            <a href="https://www.instagram.com/finiclasse" target="_blank"><img src="{{ URL::asset('storage/images/insta_icon.png') }}" style="width: 25px; height: 25px;" /></a>
            <a href="https://www.facebook.com/finiclasse" target="_blank"><img src="{{ URL::asset('storage/images/face_icon.png') }}" style="width: 25px; height: 25px;" /></a>
        </div>
    </div>
    <div style="width: 70%; display: inline-grid; color: #fff;">
        <table>
            <tbody style="text-align: left;">
            <tr>
                <th>Mercedes-Benz e Smart Finiclasse</th>
                <th>Mercedes-Benz Finiclasse</th>
                <th>SEAT Finiclasse  </th>
            </tr>
            <tr>
                <td>Ed. Finiclasse, E.N. 231 3500-631<br>Ranhados Viseu</td>
                <td>Variante A245 - Cruzamento do<br>Alvendre 6300-860 Guarda</td>
                <td>Av. São Miguel, 7 6300-860<br>Guarda</td>
            </tr>
            <tr>
                <td>T. 232 470 930</td>
                <td>T. 271 210 400</td>
                <td>T. 271 093 031</td>
            </tr>
            <tr>
                <td>F. 232 470 931</td>
                <td>F. 271 210 401</td>
                <td>F. 271 093 032</td>
            </tr>
            <tr>
                <td><a href="mailto:viseu@finiclasse.pt" style="color: #fff;">viseu@finiclasse.pt</a></td>
                <td><a href="mailto:guarda@finiclasse.pt" style="color: #fff;">guarda@finiclasse.pt</a></td>
                <td><a href="mailto:seat@finiclasse.pt" style="color: #fff;">seat@finiclasse.pt</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<hr style="opacity: 70%;">
<div style="padding: 20px; display: flex; justify-content: space-between;">
    {{ Illuminate\Mail\Markdown::parse($slot) }}
    <div>
        <a href="https://www.livroreclamacoes.pt/Inicio/" target="_blank" style="color: #fff;">Livro de Reclamações</a> |
        <a href="https://www.finiclasse.pt/politica-privacidade" target="_blank" style="color: #fff;">Política de Privacidade</a> |
        <a href="https://www.finiclasse.pt/politica-qualidade" target="_blank" style="color: #fff;">Política de Qualidade</a> |
        <a href="https://www.finiclasse.pt/condicoes-gerais" target="_blank" style="color: #fff;">Condições Gerais de Utilização</a> |
        <a href="https://www.finiclasse.pt/resolucao-alternativa" target="_blank" style="color: #fff;">Resolução Alternativa de Litígios</a>
    </div>
</div>
</td>
</tr>

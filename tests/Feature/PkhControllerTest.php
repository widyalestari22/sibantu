<?php


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Pkh;

class PkhControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_index_returns_correct_view_with_existing_data()
    {
        // Ambil data penerima yang ada di database
        $existingPenerima = Pkh::all();

        // Lakukan request ke route index
        $response = $this->get(route('pkh.menerima'));

        // Memastikan view yang dikembalikan adalah 'pkh.penerimaan.index'
        $response->assertViewIs('pkh.penerimaan.index');

        // Memastikan view menerima data yang benar
        $response->assertViewHas('penerima', function ($viewPenerima) use ($existingPenerima) {
            return $viewPenerima->count() === $existingPenerima->count() &&
                $viewPenerima->pluck('id')->diff($existingPenerima->pluck('id'))->isEmpty();
        });

        // Memastikan response statusnya 200
        $response->assertStatus(200);
    }
}

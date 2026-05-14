<?php

namespace App\Controllers;

use App\Models\ConfederacionesModel;

class ConfederacionesController extends BaseController
{
    protected $confederacionesModel;

    public function __construct()
    {
        $this->confederacionesModel = new ConfederacionesModel();
    }

    public function index()
    {
        $data['confederaciones'] = $this->confederacionesModel->findAll();

        return view('confederaciones/index', $data);
    }

    public function create()
    {
        return view('confederaciones/create');
    }

    public function store()
    {
        // Validación
        if (!$this->validate([
            'nombre' => 'required|max_length[100]',
            'logo' => 'permit_empty|max_length[255]|valid_url',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'logo' => $this->request->getPost('logo'),
                'id_usuario_creo' => session()->get('user_id') ?? 1, // Asumir usuario 1 por ahora
            ];

            $this->confederacionesModel->insert($data);

            return redirect()->to('/confederaciones')->with('success', 'Confederación creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al crear la confederación: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $confederacion = $this->confederacionesModel->find($id);

        if (!$confederacion) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['confederacion'] = $confederacion;

        return view('confederaciones/edit', $data);
    }

    public function update($id)
    {
        // Validación
        if (!$this->validate([
            'nombre' => 'required|max_length[100]',
            'logo' => 'permit_empty|max_length[255]|valid_url',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'logo' => $this->request->getPost('logo'),
                'id_usuario_actualizo' => session()->get('user_id') ?? 1,
            ];

            $this->confederacionesModel->update($id, $data);

            return redirect()->to('/confederaciones')->with('success', 'Confederación actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar la confederación: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = [
                'id_usuario_elimino' => session()->get('user_id') ?? 1,
            ];

            $this->confederacionesModel->update($id, $data);
            $this->confederacionesModel->delete($id);

            return redirect()->to('/confederaciones')->with('success', 'Confederación eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al eliminar la confederación: ' . $e->getMessage());
        }
    }
}
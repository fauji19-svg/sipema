<?php

namespace App\Controllers;

class FileController extends BaseController
{
    // Buka dokumen persyaratan pemohon di tab browser
    public function lihatDokumen($id)
    {
        $dok = db_connect()->table('dokumen')->where('id', $id)->get()->getRowArray();
        if (!$dok) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $path = WRITEPATH . 'uploads/dokumen/' . $dok['nama_file'];
        if (!is_file($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('File tidak ditemukan di server.');
        }

        return $this->response
            ->setHeader('Content-Type', mime_content_type($path))
            ->setHeader('Content-Disposition', 'inline; filename="' . $dok['nama_file'] . '"')
            ->setBody(file_get_contents($path));
    }

    // Buka file draft akta di tab browser
    public function lihatDraft($id)
    {
        $draft = db_connect()->table('draft_akta')->where('id', $id)->get()->getRowArray();
        if (!$draft || empty($draft['nama_file'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $path = WRITEPATH . 'uploads/draft/' . $draft['nama_file'];
        if (!is_file($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('File tidak ditemukan di server.');
        }

        return $this->response
            ->setHeader('Content-Type', mime_content_type($path))
            ->setHeader('Content-Disposition', 'inline; filename="' . $draft['nama_file'] . '"')
            ->setBody(file_get_contents($path));
    }
}
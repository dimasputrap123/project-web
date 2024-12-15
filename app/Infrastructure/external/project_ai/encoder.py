import pickle
import json
import sys

def main():
    pertanyaan_slug = json.loads(sys.argv[1])

    with open('label_encoder.pkl', 'rb') as file:
        encoders = pickle.load(file)
        
    column_encoder = ['anggota_kk','kondisi_rumah','pendapatan','sumber_air_minum','akses_listrik','kepemilikan_aset','pekerjaan','status_kepemilikan_rumah','kategori_asesmen','rekomendasi_bantuan']
    
    for col in column_encoder:
        pertanyaan_slug[col] = encoders[col].transform(pertanyaan_slug[col])

    print(json.dumps(pertanyaan_slug))

if __name__ == "__main__":
    main()
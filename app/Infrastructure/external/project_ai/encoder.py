import pickle
import json
import sys

def main():
    pertanyaan_slug = json.loads(sys.argv[1])

    with open('label_encoder.pkl', 'rb') as file:
        label_encoder = pickle.load(file)
    
    data_pendapatan = int(pertanyaan_slug['pendapatan'])
    if data_pendapatan < 1000000:
        pertanyaan_slug['pendapatan'] = 'dibawah 1jt'
    elif data_pendapatan >= 1000000 and data_pendapatan < 5000000:
        pertanyaan_slug['pendapatan'] = 'antara 1jt dan dibawah 5jt'
    elif data_pendapatan >= 5000000 and data_pendapatan < 10000000:
        pertanyaan_slug['pendapatan'] = 'antara 5jt dan dibawah 10jt'
    else:
        pertanyaan_slug['pendapatan'] = 'maksimal 10jt'
    
    data_anggota_kk = int(pertanyaan_slug['anggota_kk'])
    if data_anggota_kk == 1:
        pertanyaan_slug['anggota_kk'] = 'kk tunggal'
    elif data_anggota_kk == 2:
        pertanyaan_slug['anggota_kk'] = '2 anggota kk'
    elif data_anggota_kk == 3:
        pertanyaan_slug['anggota_kk'] = '3 anggota kk'
    elif data_anggota_kk == 4:
        pertanyaan_slug['anggota_kk'] = '4 anggota kk'
    elif data_anggota_kk > 4:
        pertanyaan_slug['anggota_kk'] = 'lebih dari 4 anggota kk'
    else:
        pertanyaan_slug['anggota_kk'] = 'tidak ada anggota' 
    
    column_encoder=['anggota_kk','kondisi_rumah','pendapatan','sumber_air_minum','akses_listrik','kepemilikan_aset','pekerjaan','status_kepemilikan_rumah']
    
    for col in column_encoder:
        pertanyaan_slug[col] = int(label_encoder[col].transform([pertanyaan_slug[col]])[0])

    for key,value in pertanyaan_slug.items():
        pertanyaan_slug[key]=int(value)
        
    print(json.dumps(pertanyaan_slug))
    
if __name__ == "__main__":
    main()
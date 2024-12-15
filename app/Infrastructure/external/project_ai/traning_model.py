from sklearn.preprocessing import LabelEncoder
import pickle

with open('label_encoder.pkl', 'rb') as file:
        label_encoder = pickle.load(file)

column_encoder=['anggota_kk','kondisi_rumah','pendapatan','sumber_air_minum','akses_listrik','kepemilikan_aset','pekerjaan','status_kepemilikan_rumah','kategori_asesmen','rekomendasi_bantuan']
for col in column_encoder:
    label_mapping = dict(zip(label_encoder[col].classes_, label_encoder[col].transform(label_encoder[col].classes_)))
    print("Label Mapping:", label_mapping)
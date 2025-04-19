import pandas as pd

# Baca data CSV
data = pd.read_excel("Transportation and Logistics Tracking Dataset..xlsx")  # Ganti dengan nama file CSV kamu

graph = {}

# Normalisasi data lokasi & inisialisasi node
all_nodes = set(data['Origin_Location'].dropna().str.strip().str.title()) | \
            set(data['Destination_Location'].dropna().str.strip().str.title())

for node in all_nodes:
    graph[node] = []

# Tambahkan edge berbobot ke graph
for index, row in data.iterrows():
    origin = str(row['Origin_Location']).strip().title()
    destination = str(row['Destination_Location']).strip().title()
    distance = row['TRANSPORTATION_DISTANCE_IN_KM']

    if pd.notna(origin) and pd.notna(destination):
        graph[origin].append((destination, distance))

# Fungsi DFS (dengan backtracking, efisien)
def dfs_path(graph, start, goal, visited=None, path=None):
    if visited is None:
        visited = set()
    if path is None:
        path = []

    visited.add(start)
    path.append(start)

    if start == goal:
        return list(path)  # Salin path saat ditemukan

    for neighbor, _ in graph.get(start, []):
        if neighbor not in visited:
            result = dfs_path(graph, neighbor, goal, visited, path)
            if result:
                return result

    path.pop()  # Backtrack
    visited.remove(start)
    return None

# Fungsi hitung total jarak berdasarkan rute
def calculate_total_distance(path, graph):
    total = 0
    for i in range(len(path) - 1):
        current = path[i]
        next_node = path[i + 1]
        for neighbor, dist in graph[current]:
            if neighbor == next_node:
                total += dist
                break
    return total

# CLI Input
all_locations = sorted(all_nodes)
print("Daftar lokasi tersedia:")
for i, loc in enumerate(all_locations):
    print(f"{i+1}. {loc}")
print("\n*** Format Lokasi: District, City, State ***\n")

start_index = int(input("Masukkan nomor titik awal: ")) - 1
goal_index = int(input("Masukkan nomor titik akhir: ")) - 1

start_node = all_locations[start_index]
goal_node = all_locations[goal_index]

# Jalankan DFS
print("\n🔍 Menjalankan pencarian DFS...\n")
if start_node in graph:
    if not graph[start_node]:
        print(f"⚠️ Titik awal '{start_node}' tidak memiliki jalur keluar.")

    path_result = dfs_path(graph, start_node, goal_node)
    if path_result:
        total_dist = calculate_total_distance(path_result, graph)
        print(f" Jalur DFS dari '{start_node}' ke '{goal_node}':")
        print(" -> ".join(path_result))
        print(f" Total jarak: {total_dist:.2f} km")
    else:
        print(f" Tidak ditemukan jalur dari '{start_node}' ke '{goal_node}'")
else:
    print(f" Titik awal '{start_node}' tidak ditemukan dalam graf.")

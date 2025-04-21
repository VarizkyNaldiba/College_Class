import pandas as pd
import time
from datetime import datetime, timedelta
import matplotlib.pyplot as plt
import networkx as nx
import numpy as np

# Load dan normalisasi
data = pd.read_excel('Transportation and Logistics Tracking Dataset..xlsx')
graph = {}

# Ambil semua node unik
all_nodes = set(data['Origin_Location'].dropna().str.strip().str.title()) | \
            set(data['Destination_Location'].dropna().str.strip().str.title())

for node in all_nodes:
    graph[node] = []

# Tambahkan edge berbobot
for index, row in data.iterrows():
    origin = str(row['Origin_Location']).strip().title()
    destination = str(row['Destination_Location']).strip().title()
    distance = row['TRANSPORTATION_DISTANCE_IN_KM']
    
    if pd.notna(origin) and pd.notna(destination):
        graph[origin].append((destination, distance))

# Buat graph NetworkX untuk visualisasi
def create_networkx_graph(graph_dict):
    G = nx.DiGraph()
    
    # Tambahkan nodes
    for node in graph_dict:
        G.add_node(node)
    
    # Tambahkan edges
    for source, destinations in graph_dict.items():
        for destination, weight in destinations:
            G.add_edge(source, destination, weight=weight)
    
    return G

# Visualisasi graph
def visualize_graph(G, path=None, title="Transportation Network"):
    plt.figure(figsize=(16, 12))
    
    # Posisi node
    pos = nx.spring_layout(G, seed=42, k=0.5)
    
    # Visualisasi semua nodes dan edges
    nx.draw_networkx_nodes(G, pos, node_size=300, node_color='lightblue')
    
    # Visualisasi edges dengan weight sebagai label
    edge_labels = {(u, v): f"{d['weight']:.1f}km" for u, v, d in G.edges(data=True)}
    nx.draw_networkx_edge_labels(G, pos, edge_labels=edge_labels, font_size=8)
    
    # Default edges
    nx.draw_networkx_edges(G, pos, width=1.0, alpha=0.3, arrows=True, arrowsize=15)
    
    # Jika ada path, visualisasi dengan warna khusus
    if path:
        path_edges = [(path[i], path[i+1]) for i in range(len(path)-1)]
        nx.draw_networkx_edges(G, pos, edgelist=path_edges, width=3.0, edge_color='red', arrows=True, arrowsize=20)
        
        # Highlight nodes dalam path
        path_nodes = path
        nx.draw_networkx_nodes(G, pos, nodelist=path_nodes, node_size=500, node_color='red')
        
        # Highlight nodes awal dan akhir
        nx.draw_networkx_nodes(G, pos, nodelist=[path[0]], node_size=700, node_color='green')
        nx.draw_networkx_nodes(G, pos, nodelist=[path[-1]], node_size=700, node_color='orange')
    
    # Label untuk nodes
    labels = {}
    for node in G.nodes():
        # Potong nama lokasi jika terlalu panjang
        short_name = node.split(',')[0] if ',' in node else node
        if len(short_name) > 15:
            short_name = short_name[:12] + '...'
        labels[node] = short_name
    
    nx.draw_networkx_labels(G, pos, labels=labels, font_size=10, font_weight='bold')
    
    plt.title(title)
    plt.axis('off')
    plt.tight_layout()
    plt.savefig(f"{title.replace(' ', '_')}.png", dpi=300)
    plt.show()

# DFS tunggal
def dfs_path(graph, start, goal):
    visited = set()
    stack = [(start, [start])]
    nodes_visited = 0
    start_time = time.time()

    while stack:
        current, path = stack.pop()
        nodes_visited += 1

        if current == goal:
            return path, nodes_visited, time.time() - start_time

        if current not in visited:
            visited.add(current)
            for neighbor, _ in graph.get(current, []):
                if neighbor not in visited:
                    stack.append((neighbor, path + [neighbor]))

    return None, nodes_visited, time.time() - start_time

# Hitung total jarak
def calculate_total_distance(path, graph):
    total = 0
    for i in range(len(path) - 1):
        for neighbor, dist in graph[path[i]]:
            if neighbor == path[i + 1]:
                total += dist
                break
    return total

# Estimasi waktu per segmen
def calculate_segment_time(distance, speed_kmph=50):
    return distance / speed_kmph

# Validasi waktu operasional
def is_within_operational_time(current_time, duration_hours):
    arrival_time = current_time + timedelta(hours=duration_hours)
    if 6 <= arrival_time.hour < 18:
        return True, arrival_time
    return False, arrival_time

# DFS multi-goal
def dfs_multi_goal(graph, start, goals):
    full_path = [start]
    current_node = start
    total_distance = 0
    total_time = 0
    nodes_visited_total = 0
    current_time = datetime(2025, 4, 21, 6, 0)  # Optional, bisa dihapus kalau tidak dipakai

    for goal in goals:
        segment_path, visited, exec_time = dfs_path(graph, current_node, goal)

        if not segment_path:
            print(f"❌ Tidak ada jalur dari {current_node} ke {goal}")
            return None

        for i in range(len(segment_path) - 1):
            cur = segment_path[i]
            nxt = segment_path[i + 1]
            for neighbor, dist in graph[cur]:
                if neighbor == nxt:
                    segment_duration = calculate_segment_time(dist)
                    total_distance += dist
                    total_time += segment_duration
                    current_time += timedelta(hours=segment_duration)  # Opsional kalau ingin estimasi waktu akhir
                    break

        full_path.extend(segment_path[1:])
        current_node = goal
        nodes_visited_total += visited

    return full_path, total_distance, total_time, nodes_visited_total, current_time

# Buat NetworkX graph untuk visualisasi
nx_graph = create_networkx_graph(graph)

# Visualisasi graf sebelum perhitungan rute
visualize_graph(nx_graph, title="Jaringan Transportasi Lengkap")

# CLI
all_locations = sorted(all_nodes)
print("\nDaftar lokasi:")
for i, loc in enumerate(all_locations):
    print(f"{i+1}. {loc}")
print("\n*** Format Lokasi: District, City, State ***\n")

# Input
start_index = int(input("Nomor lokasi awal: ")) - 1
goal_count = int(input("Jumlah tujuan: "))
goal_indices = [int(input(f"Nomor tujuan ke-{i+1}: ")) - 1 for i in range(goal_count)]

start_node = all_locations[start_index]
goals = [all_locations[i] for i in goal_indices]

# Jalankan
print("\n🚚 Menjalankan pengiriman multi-tujuan...\n")
result = dfs_multi_goal(graph, start_node, goals)

if result:
    path, total_dist, total_hours, visited_total, final_time = result
    print("\n✅ Rute Pengiriman:")
    print(" -> ".join(path))
    print(f"🛣️  Total Jarak Tempuh     : {total_dist:.2f} km")
    print(f"⏱️  Total Waktu Tempuh     : {total_hours:.2f} jam")
    print(f"🕰️  Estimasi Tiba Terakhir : {final_time.strftime('%H:%M')}")
    print(f"🧭  Total Node Dikunjungi  : {visited_total}")
    
    # Visualisasi rute yang telah dihitung
    visualize_graph(nx_graph, path=path, title=f"Rute Optimal: {start_node} → {goals[-1]}")
else:
    print("❌ Pengiriman gagal direncanakan.")